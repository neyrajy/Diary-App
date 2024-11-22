<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\SClass;
use App\Models\Section;
use App\Models\BloodGroups;
use App\Models\Fee;

class StudentController extends Controller
{
    public function create()
    {
        $studentsCount = Student::all();
        $classes = SClass::all();
        $sections = Section::all();
        $students = Student::all();
        $bloodGroups = BloodGroups::all();
        return view('students.create', compact('studentsCount','classes', 'sections', 'students', 'bloodGroups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            's_class_id' => 'required|integer',
            'section_id' => 'required|integer',
            'adm_no' => 'required|string|max:30|unique:students',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gender' => 'required|in:male,female',
            'disability' => 'nullable|string|max:255',
            'special_care_diet' => 'nullable|string',
            'guardian_1' => 'nullable|string|max:255',
            'guardian_2' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos/student', 'public');
        }

        Student::create($data);

        return redirect()->route('admin.students')->with('success', 'Student created successfully.');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        $classes = SClass::all();
        $sections = Section::all();
        $bloodGroups = BloodGroups::all();
        $activities = $student->activities()->latest()->first();
        $fees = Fee::where('student_id', $id)->first();
    
        return view('students.show', compact('student', 'activities', 'fees', 'classes', 'sections', 'bloodGroups'));
    }
    
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classes = SClass::all();
        $sections = Section::all();
        $bloodGroups = BloodGroups::all();
        return view('students.edit', compact('student', 'classes', 'sections', 'bloodGroups'));
    }
    
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            's_class_id' => 'required|integer',
            'section_id' => 'required|integer',
            'adm_no' => "required|string|max:30|unique:students,adm_no,{$student->id}",
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gender' => 'required|in:male,female',
            'disability' => 'nullable|string|max:255',
            'special_care_diet' => 'nullable|string',
            'guardian_1' => 'nullable|string|max:255',
            'guardian_2' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            if ($student->photo && file_exists(storage_path("app/public/{$student->photo}"))) {
                unlink(storage_path("app/public/{$student->photo}"));
            }
            $data['photo'] = $request->file('photo')->store('photos/student', 'public');
        }

        $student->update($data);

        return redirect()->route('admin.students')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        // Delete photo if exists
        if ($student->photo && file_exists(storage_path("app/public/{$student->photo}"))) {
            unlink(storage_path("app/public/{$student->photo}"));
        }

        $student->delete();

        return redirect()->route('admin.students')->with('success', 'Student deleted successfully.');
    } 
}
