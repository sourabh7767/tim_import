<?php

namespace App\Imports;
use Illuminate\Support\Facades\Log;
error_reporting(E_ALL);
ini_set('display_errors', 1);

use App\Models\Door;
use App\Models\ImportHistory;
use App\Models\Window;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ToModel;


class ImportDoor implements ToModel
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


    public function __construct($jsonFile)
    {
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
    $recordCount = 0;
    if (self::$isFirstRow) {
        self::$isFirstRow = false;
        return null; 
    }
    $importID = mt_rand(111111,999999);


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
        $mappedData['import_id'] = $importID;
        if($this->table == 'doors'){
            $data = Door::create($mappedData);
        }elseif($this->table == "windows"){
            $data = Window::create($mappedData);
        }
        if ($data) {
            $recordCount++;
        }
    
        // Update the ImportHistory with the record count
        ImportHistory::create([
            'import_id' => $importID,
            'record_count' => $recordCount,
            'status' => 2
        ]);
    
        return $data;
    }

    return null;
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
}
