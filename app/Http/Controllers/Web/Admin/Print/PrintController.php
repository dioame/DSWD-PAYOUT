<?php

namespace App\Http\Controllers\Web\Admin\Print;

use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Admin\Capture;
use App\Services\Admin\Capture\GetCaptureService;
use App\Http\LiveWire\CaptureView;

class PrintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latest = Capture::orderBy('captured_at', 'desc')->get();

        
        $duplicate = Capture::whereIn('payroll_no', function ($query) {
            $query->select('payroll_no')
                ->from('capture')
                ->groupBy('payroll_no')
                ->havingRaw('COUNT(*) > 1');
        })
        ->orderBy('payroll_no', 'asc')
        ->get();
        
        return view('print.index', compact('latest', 'duplicate'));
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
        // return view('print.pdf-template',compact('chunks'));
    }

    public function formatArray($arr){
        $chunk_4 = array_chunk($arr,4);
        $data = [];
        foreach($chunk_4 as $chunk){
            $chunk_2 = array_chunk($chunk,2);
            $data[] = $chunk_2;
        }


        // echo "<pre>";
        // print_r($data);
        //  echo "</pre>";

        // die();
        return $data;
    }
    
    
    
    

}
