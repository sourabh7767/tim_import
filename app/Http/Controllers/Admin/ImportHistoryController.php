<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportHistory;
use Illuminate\Http\Request;

class ImportHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,ImportHistory $importHistory)
    {
        if ($request->ajax()) {
            $importHistories = $importHistory->getAllImports($request);
            $totalUsers = ImportHistory::count();
            $search = $request['search']['value'];
            $setFilteredRecords = $totalUsers;

            if (! empty($search)) {
                $setFilteredRecords = $importHistory->getAllImports($request, true);
                if(empty($setFilteredRecords))
                    $totalUsers = 0;
            }

            return datatables()
                    ->of($importHistories)
                    ->addIndexColumn()
                    ->addColumn('status', function ($importHistory) {
                        return $importHistory->getStatus();
                    })
                    ->addColumn('created_at', function ($importHistory) {
                        return $importHistory->created_at;
                    })
                    ->addColumn('action', function ($importHistory) {
                            $btn = '';
                            $btn .= '<a href="javascript:void(0);" delete_form="delete_customer_form"  data-id="' . encrypt($importHistory->id) . '" class="delete-datatable-record text-danger delete-users-record" title="Delete"><i class="fas fa-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns([
                        'action',
                        'status'        
                    ])
                    ->setTotalRecords($totalUsers)
                    ->setFilteredRecords($setFilteredRecords)
                    ->skipPaging()
                    ->make(true);
        }
        return view('import-section.import-history');
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
        //
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
        // dd($id);
        $id = decrypt($id);
        $hasDelete = ImportHistory::find($id);
        if($hasDelete){
            $hasDelete->delete();
            return response()->json(["statusCode" => 200,"message" => "Deleted!"]);
            // return redirect()->back()->with("success",'Deleted');
        }
    }
}
