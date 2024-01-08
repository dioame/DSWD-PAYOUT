<?php

namespace App\Http\Controllers\Api\Admin\Capture;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Capture\StoreCaptureRequest;
use App\Services\Admin\Capture\StoreCaptureService;
// use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\Image as Image;


class CaptureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCaptureRequest $request, StoreCaptureService $service) 
    {
        //
        $idNumber = $request->input('id_number');
        $payrollNo = $request->input('payroll_no');
        $file = $request->file('file');

        $filename = $payrollNo . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Ensure the "pictures" directory exists in the storage path
        Storage::makeDirectory('public/pictures');
        
        $filePath = $file->storeAs('pictures', $filename, 'public');
        $fileUrl = Storage::url($filePath);
        
        $params = $request->all();
        $params['path'] = $filePath;
        $result = $service->execute($params);

        return response()->json([
            'status' => 'success',
            'description' => 'OK',
            'data'=>[
                'encoded_payroll'=> $result
            ]
        ],200);
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
}
