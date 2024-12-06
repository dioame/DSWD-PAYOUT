<?php

namespace App\Http\Controllers;
use App\Models\Admin\Capture;
class LiveUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('live.index');
    }
   
    public function getCapture(){
        $capture = Capture::orderBy('created_at','desc')->limit(20)->get();
        return response()->json([
            'captures' =>  $capture,
            'latest_capture' =>  $capture[0]
        ]);
    }

}
