<?php

namespace App\Http\Controllers\Web\Admin\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Capture;
use App\Models\Admin\Payroll;

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
        $payrollSummary = Payroll::leftJoin('capture', function($join) {
                $join->on('payroll.payroll_no', '=', 'capture.payroll_no')
                     ->on('payroll.municipality', '=', 'capture.municipality') 
                     ->on('payroll.modality', '=', 'capture.modality')
                     ->on('payroll.year', '=', 'capture.year');
            })
            ->select( 
                'payroll.municipality', 
                'payroll.modality', 
                'payroll.year', 
                \DB::raw('COUNT(payroll.payroll_no) AS payroll'),
                \DB::raw('COUNT(capture.payroll_no) AS capture')
            )
            ->whereNull('capture.deleted_at')
            ->groupBy('payroll.municipality', 'payroll.modality', 'payroll.year') // Ensure all selected fields are in the group by
            ->orderBy('payroll.municipality', 'asc')
            ->get();

        $claimStatus = Payroll::
        leftJoin('capture', function($join) {
            $join->on('payroll.payroll_no', '=', 'capture.payroll_no')
                 ->on('payroll.municipality', '=', 'capture.municipality') 
                 ->on('payroll.modality', '=', 'capture.modality')
                 ->on('payroll.year', '=', 'capture.year')
                 ->whereNull('capture.deleted_at');
        })
        ->whereNull('capture.payroll_no')
        ->groupBy('payroll.claimed_status')
        ->select('payroll.claimed_status', DB::raw('count(*) as count'))
        ->get();

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
                        'countTrash',
                        'payrollSummary',
                        'claimStatus'
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
