<?php

namespace App\Imports;
use App\Models\Appliance;
use Illuminate\Support\Facades\Log;
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

use App\Models\Door;
use App\Models\Generator;
use App\Models\ImportHistory;
use App\Models\Window;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\ToModel;


class ImportDoor implements ToModel, WithChunkReading

{
    /**
    * @param Collection $collection
    */
    protected $json;
    protected $keyCategoryColumn;
    protected $filters;
    protected $headerToDbColumnMap = [];
    protected static $isFirstRow = true;
    protected $table; 
    protected $jsonFileName;
    protected $xlsxFileName;
    protected $importID;
    protected $totalRecordCount = 0;
    protected $type;


    public function __construct($jsonFile,$jsonFileName,$xlsxFileName,$type)
    {
        $this->type = $type;
        $this->importID = mt_rand(111111,999999);
        $this->jsonFileName = $jsonFileName;
        $this->xlsxFileName = $xlsxFileName;
        $jsonData = json_decode(file_get_contents($jsonFile), true);

        $this->keyCategoryColumn = $jsonData[0]['key_category_column'];
        $this->filters = $jsonData[0]['key_category_filter'];
        $this->table = $jsonData[0]['key_category_type'];

        foreach ($jsonData[0]['fields'] as $field) {
            $this->headerToDbColumnMap[$field['db_column']] = [
                'header_value' => $field['header_value'],
                'import_column' => $field['import_column'],
                'filter' => $field['filter']
            ];
        }
    }
public function model(array $row)
{
    // $recordCount = 0;
    if (self::$isFirstRow) {
        self::$isFirstRow = false;
        return null; 
    }
    
    $keyCategoryIndex = $this->getColumnIndex($this->keyCategoryColumn);
    if (in_array($row[$keyCategoryIndex], $this->filters)) {
        $mappedData = [];
        
        $columns = Schema::getColumnListing($this->table);
        foreach ($this->headerToDbColumnMap as $dbColumn => $settings) {
            if (!in_array($dbColumn, $columns)) {
                Log::info("Skipping column", ["Column" => $dbColumn, "Reason" => "Not in valid columns"]);
                continue; 
            }

            $importColumn = $this->getColumnIndex($settings['import_column']);
            $filterFunction = !empty($settings['filter']) ?$settings['filter']: $dbColumn;
            if (isset($row[$importColumn])) {
                if ($filterFunction && function_exists($filterFunction)) {
                    $processedValue = $filterFunction($row[$importColumn],$settings['import_column']);
                } else {
                    $processedValue = $row[$importColumn];
                }

                $mappedData[$dbColumn] = $processedValue;
            }
        }
        $mappedData['import_id'] = $this->importID;
        if($this->table == 'doors'){
            $data = Door::create($mappedData);
        }elseif($this->table == "windows"){
            $data = Window::create($mappedData);
        }elseif($this->table == "generators"){
            $data = Generator::create($mappedData);
        }elseif($this->table == "appliances"){
            $data = Appliance::create($mappedData);
        }
        if ($data) {
            $this->totalRecordCount++;
        }
       
        return $data;
    }

    return null;
}
public function __destruct()
    {
        ImportHistory::create([
            'import_id' => $this->importID,
            'record_count' => $this->totalRecordCount,
            'json_file' => $this->jsonFileName,
            'xlsx_file' => $this->xlsxFileName,
            'status' => 2,
            'type' => $this->type
        ]);
    }

private function getColumnIndex($columnLetter)
    {
        $columnLetter = strtoupper($columnLetter);
        $length = strlen($columnLetter);
        $index = 0;

        for ($i = 0; $i < $length; $i++) {
            $index = $index * 26 + (ord($columnLetter[$i]) - ord('A'));
        }

        return $index;
    }

    public function chunkSize(): int
    {
        return 1500; 
    }
}
