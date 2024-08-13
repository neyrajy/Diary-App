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
    
    public function update(Request $request, $id)
    {
        $request->validate([

            'firstname' => 'required|string|max:255',
            'secondname' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            's_class_id' => 'required|exists:s_classes,id',
            'section_id' => 'required|exists:sections,id',
            'session' => 'required|string|max:255',
            'adm_no' => 'nullable|string|max:30|unique:students',
            'admission_date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'age' => 'nullable|date',
            'bg_id' => 'nullable|exists:blood_groups,id',
            'grad' => 'nullable|boolean',
            'grad_date' => 'nullable|date',
        ]);
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('photos/students', 'public'); 
        }

        $student = Student::findOrFail($id);
        $student->firstname = $request->firstname;
        $student->secondname = $request->secondname;
        $student->lastname = $request->lastname;
        $student->s_class_id = $request->s_class_id;
        $student->section_id = $request->section_id;
        $student->session = $request->session;
        $student->adm_no =  $request->adm_no;
        $student->admission_date = $request->admission_date;
        $student->photo = $photoPath ? asset('storage/' . $photoPath) : null;
        $student->age = $request->age;
        $student->bg_id = $request->bg_id;
        $student->grad = $request->has('grad') ? 1 : 0;
        $student->grad_date = $request->grad_date;
        \Log::info('Student data to be saved:', $student->toArray());
    
        $student->save();
    
        return redirect()->route('superadmin.students')->with('success', 'Student updated successfully');
    }
    
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('superadmin.students')->with('success', 'Student deleted successfully');
    }
    
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
        'secondname' => 'nullable|string|max:255',
        'lastname' => 'required|string|max:255',
        's_class_id' => 'required|exists:s_classes,id',
        'section_id' => 'required|exists:sections,id',
        'session' => 'required|string|max:255',
        'adm_no' => 'nullable|string|max:30|unique:students',
        'admission_date' => 'nullable|date',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'age' => 'nullable|date',
        'bg_id' => 'nullable|exists:blood_groups,id',
        'grad' => 'nullable|boolean',
        'grad_date' => 'nullable|date',
    ]);

    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $photoPath = $photo->store('photos/students', 'public'); 
    }

    $student = Student::create([
        'firstname' => $request->firstname,
        'secondname' => $request->secondname,
        'lastname' => $request->lastname,
        's_class_id' => $request->s_class_id,
        'section_id' => $request->section_id,
        'session' => $request->session,
        'adm_no' => $request->adm_no,
        'admission_date' => $request->admission_date,
        'photo' => $photoPath ? asset('storage/' . $photoPath) : null,
        'age' => $request->age,
        'bg_id' => $request->bg_id,
        'grad' => $request->has('grad') ? 1 : 0, 
        'grad_date' => $request->grad_date,
    ]);

    return redirect()->route('superadmin.students')->with('success', 'Student registered successfully.');
}

 
    
}
