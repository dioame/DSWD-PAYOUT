<?php

namespace App\Http\Controllers\Web\Admin\Print;

use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Admin\Capture;
use App\Models\Admin\Payroll;
use App\Services\Admin\Capture\GetCaptureService;
use App\Http\LiveWire\CaptureView;
use App\DataTables\CaptureDataTable;
use App\DataTables\DuplicateCaptureTable;
use App\DataTables\NYCaptureDataTable;
use App\DataTables\TrashCaptureTable;

class PrintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CaptureDataTable $dataTable)
    {
        // $latest = Capture::orderBy('captured_at', 'desc')->paginate(10);
        // return view('print.index', compact('latest'));
        return $dataTable->render('print.index');
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

    private function getSortedImages($path)
    {
        $files = File::files($path);
        $sortedFiles = collect($files)->sortBy('filename');
        return array_values($sortedFiles->all());
    }

    public function generatePdf($range,GetCaptureService $service)
    {
        $params = [
            'range' => $range
        ];
        $query = $service->execute($params);
        $chunks = $this->formatArray($query->toArray());

        $pdf = PDF::loadView('print.pdf-template', compact('chunks'))->setPaper('a4', 'portrait');
        return $pdf->download('pictures.pdf');
    }

    public function formatArray($arr){
        $chunk_4 = array_chunk($arr,4);
        $data = [];
        foreach($chunk_4 as $chunk){
            $chunk_2 = array_chunk($chunk,2);
            $data[] = $chunk_2;
        }

        return $data;
    }

    // public function duplicateCapture(){
    //     $duplicate = Capture::join(
    //         DB::raw('(SELECT payroll_no FROM capture WHERE deleted_at IS NULL GROUP BY payroll_no HAVING COUNT(*) > 1) as duplicates'),
    //         'capture.payroll_no', '=', 'duplicates.payroll_no'
    //     )
    //     ->orderBy('capture.payroll_no', 'asc')
    //     ->paginate(10);

    //     return view('print.duplicate', compact('duplicate'));

    // }

    public function duplicateCapture(DuplicateCaptureTable $dataTable){
        return $dataTable->render('print.duplicate');
    }
    
    // public function nyCapture(){
    //     $nyCapture = Payroll::leftJoin('capture', 'payroll.payroll_no', '=', 'capture.payroll_no')
    //     ->select('payroll.*')
    //     ->whereNull('capture.payroll_no')
    //     // ->orWhereNotNull('capture.deleted_at')
    //     ->whereNull('capture.deleted_at')
    //     ->paginate(10);

    //     return view('print.ny', compact('nyCapture'));

    // }

    public function nyCapture(NYCaptureDataTable $dataTable){
        return $dataTable->render('print.ny');
    }


    public function trash(TrashCaptureTable $dataTable){
        return $dataTable->render('print.trash');
    }

    // public function trash(TrashCaptureTable $dataTable)
    // {
    //     $trash = Capture::orderBy('captured_at', 'desc')->onlyTrashed()->paginate(10);
    
    //     return view('print.trash', compact('trash'));
    // }
    
    
    

}
