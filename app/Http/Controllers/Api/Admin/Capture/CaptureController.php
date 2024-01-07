<?php

namespace App\Http\Controllers\Api\Admin\Capture;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Capture\StoreCaptureRequest;
use Intervention\Image\Facades\Image;


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
    public function store(StoreCaptureRequest $request)
    {
        //
        $payrollNo = $request->input('payroll_no');
        $file = $request->file('file');

        $filename = $payrollNo . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Ensure the "pictures" directory exists in the storage path
        Storage::makeDirectory('public/pictures');
        
        $filePath = $file->storeAs('pictures', $filename, 'public');
        $fileUrl = Storage::url($filePath);

        return response()->json([
            'status' => 'success',
            'description' => 'OK',
            'data'=>[
                'path'=>$fileUrl
            ]
        ],200);
    }

    // public function store(StoreCaptureRequest $request)
    // {
    //     //
    //     $payrollNo = $request->input('payroll_no');
    //     $file = $request->file('file');
        
    //     // Generate a unique filename
    //     $filename = $payrollNo . '_' . time() . '.' . $file->getClientOriginalExtension();

    //     // Ensure the "pictures" directory exists in the storage path
    //     Storage::makeDirectory('public/pictures');

    //     // Compress and save the image
    //     $img = Image::make($file->path());
    //     $img->encode($file->getClientOriginalExtension(), 80); // Adjust quality as needed

    //     $compressedFilename = $payrollNo . '_compressed_' . time() . '.' . $file->getClientOriginalExtension();
    //     $compressedFilePath = $img->storeAs('pictures', $compressedFilename, 'public');
    //     $compressedFileUrl = Storage::url($compressedFilePath);

    //     return response()->json([
    //         'status' => 'success',
    //         'description' => 'OK',
    //         'data' => [
    //             'original_path' => Storage::url($file->storeAs('pictures', $filename, 'public')),
    //             'compressed_path' => $compressedFileUrl,
    //         ]
    //     ], 200);
    // }
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
