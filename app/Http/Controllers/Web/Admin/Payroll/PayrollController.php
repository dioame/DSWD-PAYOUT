<?php

namespace App\Http\Controllers\Web\Admin\Payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Payroll;
use App\Models\LibModality;
use App\DataTables\PayrollDataTable;
use Illuminate\Support\Facades\Artisan;
use App\Jobs\ImportPayrollJob;
use Illuminate\Support\Facades\Storage;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PayrollDataTable $dataTable)
    {
        
        // return view('payroll.index');
        return $dataTable->render('payroll.index');
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

    public function editStatus($id,$status){
        $payroll = Payroll::find($id)->update(['claimed_status'=>$status]);

    }

    public function deletePayrollAll(){
        Payroll::truncate();
    }

    public function importForm(){
        $modalities = LibModality::all();
        return view('payroll.import-form',compact('modalities'));
    }

    public function import(Request $request){
        
        $file = $request->file('excel_file');
        if ($file) {
            Artisan::call('queue:work', ['--once' => true]);
            
            $directory = 'tmp';
            if (!is_dir(storage_path("app/public/{$directory}"))) {
                mkdir(storage_path("app/public/{$directory}"));
            }
        
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->storeAs($directory, $filename, 'public');
            $filePath = storage_path("app/public/{$directory}/{$filename}"); // Corrected path
            
            $params = [
                'modality' => $request->input('modality'),
                'year' => $request->input('year'),
                'id_number' => $request->input('id_number'),
                'path' => $filePath
            ];

            ImportPayrollJob::dispatch($params);
           

            // Remove the temporary file
            Storage::disk('public')->delete("{$directory}/{$filename}");
            return redirect()->route('payroll.index');
        }
    }
    

}
