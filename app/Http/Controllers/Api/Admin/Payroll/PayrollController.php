<?php

namespace App\Http\Controllers\Api\Admin\Payroll;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\Payroll\GetPayrollService;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, GetPayrollService $service)
    {
        // var_dump($request->all());

        $perPage = $request->input('length', 10);
        $params['page'] = $request->input('start', 0) / $perPage + 1;
        $params['length'] = $perPage;
        $params['searchValue'] = $request->input('search.value');

        return response()->json([
            'status' => 'success',
            'description' => 'OK',
            'data'=>$service->execute($params)
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
    public function store()
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
}
