<?php

namespace App\Http\Controllers\Web\Admin\LibModality;

use App\Models\LibModality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\LibModalityDataTable;

class LibModalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LibModalityDataTable $dataTable)
    {
        return $dataTable->render('lib_modality.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lib_modality.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:lib_modality|max:255',
            'description' => 'nullable',
        ]);

        LibModality::create($request->all());

        return redirect()->route('lib_modalities.index')
                         ->with('success', 'LibModality created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LibModality $libModality)
    {
        return view('lib_modality.show', compact('libModality'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LibModality $libModality)
    {
        return view('lib_modality.edit', compact('libModality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LibModality $libModality)
    {
        $request->validate([
            'name' => 'required|max:255|unique:lib_modality,name,' . $libModality->id,
            'description' => 'nullable',
        ]);

        $libModality->update($request->all());

        return redirect()->route('lib_modalities.index')
                         ->with('success', 'LibModality updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LibModality $libModality)
    {
        $libModality->delete();
    }
}
