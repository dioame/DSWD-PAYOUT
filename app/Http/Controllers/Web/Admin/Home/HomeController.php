<?php

namespace App\Http\Controllers\Web\Admin\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Capture;

use App\DataTables\CaptureDataTable;
use App\DataTables\PayrollDataTable;
use App\DataTables\DuplicateCaptureTable;
use App\DataTables\NYCaptureDataTable;
use App\DataTables\NYPayrollTable;
use App\DataTables\TrashCaptureTable;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        CaptureDataTable $capture,
        PayrollDataTable $payroll,
        DuplicateCaptureTable $duplicate,
        NYCaptureDataTable $nyCapture,
        NYPayrollTable $nyPayroll,
        TrashCaptureTable $trashCapture
    )
    {

        $countCapture = $capture->countRecords();
        $countPayroll = $payroll->countRecords();
        $countDuplicate = $duplicate->countRecords();
        $countNYCapture = $nyCapture->countRecords();
        $countNYPayroll = $nyPayroll->countRecords();
        $countTrash = $trashCapture->countRecords();

        return view('index',
                    compact(
                        'countCapture',
                        'countPayroll',
                        'countDuplicate',
                        'countNYCapture',
                        'countNYPayroll',
                        'countTrash'
                    )
                );
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
