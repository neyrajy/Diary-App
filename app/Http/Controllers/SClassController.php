<?php

namespace App\Http\Controllers;

use App\Models\SClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SClassController extends Controller
{
    
    public function index()
    {
        $classes = SClass::all();
        $classesCount = SClass::all()->count();
        return view('classes.index', compact('classes', 'classesCount'));
    }

    public function create()
    {
        return view('classes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(SClass $sClass)
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        SClass::create($request->all());
        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function edit(SClass $class)
    {
        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, SClass $class)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $class->update($request->all());
        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy(SClass $class)
    {
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
