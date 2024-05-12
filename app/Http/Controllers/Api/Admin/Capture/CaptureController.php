<?php

namespace App\Http\Controllers\Api\Admin\Capture;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Capture\StoreCaptureRequest;
use App\Services\Admin\Capture\StoreCaptureService;
use App\Models\Admin\Capture;
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
        $databaseName = config('database.connections.mysql.database');
        $fileDirectoryName = $databaseName;

        Storage::makeDirectory('public/pictures/'.$fileDirectoryName);

        $tempFilePath = $file->getRealPath();
        $this->correctImageOrientation($tempFilePath);

        // adjust quality
        $sourceImg = imagecreatefromstring(file_get_contents($tempFilePath));
        imagejpeg($sourceImg, storage_path('app/public/pictures/'.$fileDirectoryName.'/'. $filename), 25);
        imagedestroy($sourceImg);
        $filePath = 'pictures/'.$fileDirectoryName.'/'. $filename;
        // end adjustment
        
        // $filePath = $file->storeAs('pictures', $filename, 'public');
        // Storage::url($filePath);
        
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

    public function correctImageOrientation($filename) {
        if (file_exists($filename)) {
        if (function_exists('exif_read_data')) {
          $exif = exif_read_data($filename);
          if($exif && isset($exif['Orientation'])) {
            $orientation = $exif['Orientation'];

            // var_dump($orientation);
            // die();
            if($orientation != 1){
              $img = imagecreatefromjpeg($filename);
              $deg = 0;
              switch ($orientation) {
                case 3:
                  $deg = 180;
                  break;
                case 6:
                  $deg = 270;
                  break;
                case 8:
                  $deg = 90;
                  break;
              }
              if ($deg) {
                $img = imagerotate($img, $deg, 0);        
              }
              // then rewrite the rotated image back to the disk as $filename 
              imagejpeg($img, $filename, 95);
            } // if there is some rotation necessary
          } // if have the exif orientation info
        } // if function exists      
      }
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
    public function destroy($id)
    {
        //
        $capture = Capture::where('id', $id)->first();
        if (!$capture) {
            return response()->json([
                'status' => 'error',
                'description' => 'Not Found',
            ], 404);
        }
        
        $capture->delete();
        return response()->json([
            'status' => 'success',
            'description' => 'OK',
        ], 200);
        
    }
}
