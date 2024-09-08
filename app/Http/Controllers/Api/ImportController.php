<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportDoor;
use App\Models\Door;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    //
    public function store(Request $request)
    {
        $rules = array(
            'jsonFile' => 'required|mimes:json',
            'xlsxFile' => 'required|mimes:xlsx',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errorMessages = $validator->errors()->all();
            throw new HttpResponseException(returnValidationErrorResponse($errorMessages[0]));
        }

        $jsonFile = $request->file('jsonFile');
        $xlsxFile = $request->file('xlsxFile');
        $jsonFileName = $jsonFile->getClientOriginalName();
        $xlsxFileName = $xlsxFile->getClientOriginalName();
        Excel::import(new ImportDoor($jsonFile,$jsonFileName,$xlsxFileName), $xlsxFile);
        return returnSuccessResponse("Data processed and inserted successfully");
    }
}
