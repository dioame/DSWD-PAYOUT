<?php

namespace App\Http\Controllers\Web\Admin\Capture;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Capture;

class CaptureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('capture.index');
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
}
