<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\SClass;
use App\Models\Section;

class StudentController extends Controller
{
    public function edit($id)
    {
        $student = User::findOrFail($id);
        $classes = SClass::all();
        $sections = Section::all();
        return view('students.edit', compact('student', 'classes', 'sections'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'class_id' => 'required|exists:s_classes,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        $student = User::findOrFail($id);
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->phone = $request->phone;
        $student->class_id = $request->class_id;
        $student->section_id = $request->section_id;
        $student->save();

        return redirect()->route('superadmin.students')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = User::findOrFail($id);
        $student->delete();
        return redirect()->route('superadmin.students')->with('success', 'Student deleted successfully');
    }

    public function create()
    {
        $classes = SClass::all();
        $sections = Section::all();
        return view('students.create', compact('classes', 'sections'));
    }

    public function storex(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'class_id' => 'required|integer',
            'section_id' => 'required|integer',
        ]);

        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role_id' => 8, // Assuming 8 is the role ID for students
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
        ]);

        return redirect()->route('superadmin.students')->with('success', 'Student added successfully');
    }
    public function store(Request $request)
{
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'my_parent_id' => 'required|exists:users,id',
        's_class_id' => 'required|exists:classes,id',
        'section_id' => 'required|exists:sections,id',
        'session' => 'required|string|max:255',
        'age' => 'nullable|integer|min:1',
        'year_admitted' => 'nullable|string|max:255',
        'adm_no' => 'nullable|string|max:30|unique:students',
        'grad' => 'nullable|boolean',
        'grad_date' => 'nullable|date',
    ]);

    $parent = User::find($request->my_parent_id);

    $student = Student::create([
        'user_id' => auth()->id(),
        'my_parent_id' => $request->my_parent_id,
        's_class_id' => $request->s_class_id,
        'section_id' => $request->section_id,
        'session' => $request->session,
        'age' => $request->age,
        'year_admitted' => $request->year_admitted,
        'adm_no' => $request->adm_no,
        'grad' => $request->grad,
        'grad_date' => $request->grad_date,
    ]);

    return redirect()->route('superadmin.students')->with('success', 'Student registered successfully.');
}

}
