<?php

namespace App\Http\Controllers;

use App\Models\SClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSClassRequest;
use App\Http\Requests\UpdateSClassRequest;

class SClassController extends Controller
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
    public function store(StoreSClassRequest $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
        ]);

        SClass::create([
            'name' => $request->class_name,
        ]);

        return redirect()->route('superadmin.students')->with('success', 'Class added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SClass $sClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SClass $sClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSClassRequest $request, SClass $sClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SClass $sClass)
    {
        //
    }
}
