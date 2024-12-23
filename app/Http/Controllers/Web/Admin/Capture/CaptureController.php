<?php

namespace App\Http\Controllers\Web\Admin\Capture;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Capture;
use App\Models\Admin\Payroll;
use App\Services\Admin\Capture\StoreCaptureService;
use Illuminate\Support\Facades\DB;


class CaptureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $modalities = Payroll::select(
            'municipality',
            'modality',
            'year',
            DB::raw('count(*) as count')
        )
        ->groupBy('municipality', 'modality', 'year')
        ->orderBy('municipality', 'asc')
        ->orderBy('modality', 'asc')
        ->orderBy('year', 'asc')
        ->get();

        // Prepare the data for select forms
        $options = [];
        foreach ($modalities as $modality) {
        $options[] = [
        'municipality' => $modality->municipality,
        'barangay' => $modality->barangay,
        'modality' => $modality->modality,
        'year' => $modality->year,
        ];
        }
        return view('capture.index', compact('options'));
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

    public function editForm($id){
        $capture = Capture::find($id);
        return view('capture.edit-form', compact('capture'));
    }
    
    public function editCapture($id,Request $request){
        Capture::find($id)->update([
            'payroll_no' => $request->payroll_no
        ]);
        
        return redirect()->route('print.index');
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
    public function destroy($id)
    {
        //
        $capture = Capture::where('id', $id)->first();
        $capture->delete();
        return redirect()->route('print.duplicate-capture');
        
    }

    public function restore($id){
        $capture = Capture::onlyTrashed()->where('id', $id)->first();
        $capture->restore();
        return redirect()->route('print.trash');
    }

    public function deleteCapture($id){
        $capture = Capture::where('id', $id)->first();
        $capture->delete();
        return redirect()->route('capture.print-index');
    }

    public function uploadFolder(Request $request, StoreCaptureService $service){
        $idNumber = $request->input('id_number');
        
        $municipality = $request->input('municipality');
        $modality = $request->input('modality');
        $year = $request->input('year');
        

        $folder = $request->file('folder');


        $databaseName = 'documentation';
        $fileDirectoryName = $databaseName;

        foreach ($folder as $file) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/pictures/'.$fileDirectoryName, $filename);
            $filePath = "pictures/".$fileDirectoryName."/".$filename;
            
            $payrollNo = explode("_",$filename)[0];

            $service->execute([
                'payroll_no' => $payrollNo,
                'path' => $filePath,
                'id_number' => $idNumber,
                'municipality' => $municipality,
                'modality' => $modality,
                'year' => $year,
            ]);
        }

        return redirect()->route('capture.print-index');
  
    }

    public function generatePDFForm(){
        return redirect()->route('capture.pdf-form');
    }

    public function pdfForm(){
        $modalities = Payroll::select(
            'municipality',
            'modality',
            'year',
            DB::raw('count(*) as count')
        )
        ->groupBy('municipality', 'modality', 'year')
        ->orderBy('municipality', 'asc')
        ->orderBy('modality', 'asc')
        ->orderBy('year', 'asc')
        ->get();

        // Prepare the data for select forms
        $options = [];
        foreach ($modalities as $modality) {
        $options[] = [
        'municipality' => $modality->municipality,
        'barangay' => $modality->barangay,
        'modality' => $modality->modality,
        'year' => $modality->year,
        ];
        }
        return view('capture.pdf-form', compact('options'));
    }
}
