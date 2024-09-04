<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ImportDoor;
use App\Models\Door;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('import-section.import');        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = array(
            'jsonFile' => 'required|mimes:json',
            'xlsxFile' => 'required|mimes:xlsx',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $jsonFile = $request->file('jsonFile');
        $xlsxFile = $request->file('xlsxFile');
        $jsonFileName = $jsonFile->getClientOriginalName();
        $xlsxFileName = $xlsxFile->getClientOriginalName();
        Excel::import(new ImportDoor($jsonFile,$jsonFileName,$xlsxFileName), $xlsxFile);

        // Read and decode JSON file
        // $jsonData = json_decode(file_get_contents($jsonFile), true);
        // $keyCategoryColumn = $jsonData['key_category_column']; // e.g., 'F'
        // $filters = $jsonData['key_category_filter']; // e.g., ['Patio Doors', 'Entry Doors', ...]

        // // Read XLSX file
        // foreach ($data[0] as $row) {
        //     // Assuming first row is headers, compare starting from the second row
        //     if (in_array($row[$keyCategoryColumn], $filters)) {
        //         Door::create([
        //             'sales_city' => $row['A'], // Map to your columns
        //             'sales_state' => $row['B'],
        //             // ... other fields
        //             'door_category' => $row[$keyCategoryColumn], // 'F' column
        //         ]);
        //     }
        // }

        return redirect()->back()->with('success', 'Data processed and inserted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
