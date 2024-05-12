<?php

namespace App\Http\Controllers\Api\Admin\TestConnection;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\TestConnection\PostConnectionService;
use App\Services\Admin\TestConnection\PatchConnectionService;
use App\Http\Requests\Api\TestConnection\TestConnectionRequest;

class TestConnectionController extends Controller
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

    public function testConnection(TestConnectionRequest $request, PostConnectionService $services){
        $result = $services->execute($request->all());
        return response()->json([
            'status' => 'success',
            'description' => 'OK',
            'data'=> $result
        ],200);
    }

    public function testConnectionDisconnect(TestConnectionRequest $request, PatchConnectionService $services){
        $conn = $services->execute($request->all());
        return response()->json([
            'status' => 'success',
            'description' => 'OK',
        ],200);
    }
}
