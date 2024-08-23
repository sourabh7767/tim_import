<?php

namespace App\Imports;
use Illuminate\Support\Facades\Log;
error_reporting(E_ALL);
ini_set('display_errors', 1);

use App\Models\Door;
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


    // public function __construct($jsonFile)
    // {
    //     $jsonData = json_decode(file_get_contents($jsonFile), true);
    //     $this->keyCategoryColumn = $jsonData[0]['key_category_column']; // e.g., 'F'
    //     $this->filters = $jsonData[0]['key_category_filter']; // e.g., ['Patio Doors', 'Entry Doors', ...]
    // }
    public function __construct($jsonFile)
    {
        // Load JSON data
        $jsonData = json_decode(file_get_contents($jsonFile), true);

        // Extract key category column and filters
        $this->keyCategoryColumn = $jsonData[0]['key_category_column'];
        $this->filters = $jsonData[0]['key_category_filter'];

        // Map JSON fields to database columns
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
    if (self::$isFirstRow) {
        self::$isFirstRow = false;
        return null; // Return null to skip processing for the header row
    }
    // Determine the key category column index
    $keyCategoryIndex = $this->getColumnIndex($this->keyCategoryColumn);
    if (in_array($row[$keyCategoryIndex], $this->filters)) {
        $mappedData = [];
        
        $columns = Schema::getColumnListing('doors');
        foreach ($this->headerToDbColumnMap as $dbColumn => $settings) {
            if (!in_array($dbColumn, $columns)) {
                Log::info("Skipping column", ["Column" => $dbColumn, "Reason" => "Not in valid columns"]);
                continue; // Skip this column
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

        return new Door($mappedData);
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
