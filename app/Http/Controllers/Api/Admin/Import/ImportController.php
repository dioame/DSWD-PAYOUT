<?php

namespace App\Http\Controllers\Api\Admin\Import;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use App\Jobs\ImportPayrollJob;
class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json([
            'status' => 'success',
            'description' => 'OK',
        ],200);
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
    public function store(StoreCaptureRequest $request)
    {
   
    }
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

    public function importPayroll(Request $request){
        // var_dump($request->all());
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
            return response()->json([
                'status' => 'success',
                'description' => 'OK',
            ],200);
        }
    }
}
