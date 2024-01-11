<?php

namespace App\Http\Controllers\Web\Admin\Print;

use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
// use App\Models\Admin\Capture;
use App\Services\Admin\Capture\GetCaptureService;

class PrintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetCaptureService $service)
    {
        // $query = $service->execute();
        // // $chunks = $this->formatArray($query->pluck(['path','created_at']));
        //    $chunks = $this->formatArray($query);

        // echo "<pre>";
        // // var_dump($query->toArray());
        // var_dump($chunks);
        // echo "</pre>";
        // die();

        return view('print.index');
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

    public function generatePdf(GetCaptureService $service)
    {

        // $picturesPath = public_path('storage/pictures');
        // $pictures = glob($picturesPath . '/*.jpg');

        $query = $service->execute();
        $chunks = $this->formatArray($query);

        $pdf = PDF::loadView('print.pdf-template', compact('chunks'))->setPaper('a4', 'portrait');
        return $pdf->download('pictures.pdf');
    }

    public function formatArray($inputArray){
        $groupSizeOuter = 2; // Groups by 2
        $groupSizeInner = 2; // Groups by 4 (inside each outer group)
    
        $resultArray = [];
    
        $previousOuterIndices = []; // Keep track of indices used in the previous outer group
    
        for ($i = 0; $i < count($inputArray); $i += $groupSizeOuter) {
            $outerGroup = [];
    
            $addedIndices = []; // Keep track of indices used in the current outer group
    
            for ($j = 0; $j < $groupSizeOuter; $j++) {
                $innerGroup = [];
    
                for ($k = 0; $k < $groupSizeInner; $k++) {
                    $currentIndex = $i + $j * $groupSizeInner + $k;
    
                    if (
                        isset($inputArray[$currentIndex]) &&
                        !in_array($currentIndex, $addedIndices) &&
                        !in_array($currentIndex, $previousOuterIndices)
                    ) {
                        $innerGroup[] = $inputArray[$currentIndex];
                        $addedIndices[] = $currentIndex; // Mark this index as used in the current outer group
                    }
                }
    
                if (!empty($innerGroup)) {
                    $outerGroup[] = $innerGroup;
                }
            }
    
            if (!empty($outerGroup)) {
                $resultArray[] = $outerGroup;
            }
    
            $previousOuterIndices = $addedIndices; // Update the previous outer indices for the next iteration
        }
    
        return $resultArray;
    }
    
    
    
    

}
