<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\SClass;
use App\Models\User;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::with('s_class', 'teacher')->get();
        return view('sections.index', compact('sections'));
    }

    public function create()
    {
        $classes = SClass::all();
        $teachers = User::where('role_id', 5)->get(); 

        return view('sections.create', compact('classes', 'teachers'));
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            's_class_id' => 'required|exists:s_classes,id',
            'teacher_id' => 'nullable|exists:users,id',
        ]);

        Section::create([
            'name' => $request->name,
            's_class_id' => $request->s_class_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return redirect()->route('sections.index')->with('success', 'Section created successfully.');
    }

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        $classes = SClass::all();
        $teachers = User::where('role_id', 5)->get(); 

        return view('sections.edit', compact('section', 'classes', 'teachers'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            's_class_id' => 'required|exists:s_classes,id',
            'teacher_id' => 'nullable|exists:users,id',
        ]);
        $section->update($request->all());
        return redirect()->route('sections.index')->with('success', 'Section updated successfully.');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('sections.index')->with('success', 'Section deleted successfully.');
    }
}
