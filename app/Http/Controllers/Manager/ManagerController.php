<?php

namespace App\Http\Controllers\Manager;

use App\Models\Fee;
use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use App\Models\Region;
use App\Models\SClass;
use App\Models\Section;
use App\Models\Student;
use App\Models\District;
use App\Models\Nationality;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    public function dashboard()
    {
        $roles = Role::all();
        $staffs = User::where('role_id', 7)->get();
        $employees = User::where('role_id',6)->get();
        $events = Event::latest()->paginate(1);
        $parentsCount = User::where('role_id',4)->count();
        $teachersCount = User::where('role_id',5)->count();
        $studentsCount = Student::count();
        $driversCount = User::where('role_id',6)->count();
        $staffCount = User::where('role_id', 7)->count();
        return view('manager.dashboard', compact('parentsCount','teachersCount','studentsCount','driversCount','staffCount','events','employees','staffs','roles'));
    }

    public function parents(){
        $fees = Fee::all();
        $students = Student::all();
        $parentsCount = User::where('role_id', 4)->count();
        $parents = User::where('role_id',4)->paginate(10);
        return view('manager.parents', compact('parents','parentsCount','students','fees'));
    }

    public function teachers(){
        $teachersCount = User::where('role_id', 5)->count();
        $sections = Section::all();
        $classes = SClass::all();
        $teachers = User::where('role_id', 5)->paginate(10);
        return view('manager.teachers', compact('teachers','classes','sections','teachersCount'));
    }

    public function students(){
        $teachers = User::where('role_id', 5)->get();
        $sections = Section::all();
        $classes = SClass::all();
        $students = Student::all();
        $studentsCount = Student::count();
        return view('manager.students', compact('studentsCount','students','classes','sections','teachers'));
    }

    public function drivers(){
        $districts = District::all();
        $regions = Region::all();
        $nationalities = Nationality::all();
        $drivers = User::where('role_id', 6)->get();
        return view('manager.drivers', compact('drivers','nationalities','regions','districts'));
    }

    public function staff(){
        $districts = District::all();
        $regions = Region::all();
        $nationalities = Nationality::all();
        $staffs = User::where('role_id', 7)->get();
        return view('manager.staff', compact('staffs','nationalities','regions','districts'));
    }

    public function events(){
        return view('manager.events');
    }

    public function notifications(){
        $roles = Role::all();
        return view('manager.notifications', compact('roles'));
    }

    public function register_teacher(){
        $sections = Section::all();
        $classes = SClass::all();
        $disctricts = District::all();
        $regions = Region::all();
        $nationalities = Nationality::all();
        return view('manager.register-teacher', compact('nationalities','regions','disctricts','classes','sections'));
    }

    public function delete_teacher(Request $request, User $teacher){
        $teacher->delete();
        return redirect()->back();
    }

    public function edit_teacher($id){
        $sections = Section::all();
        $classes = SClass::all();
        $districts = District::all();
        $regions = Region::all();
        $nationalities = Nationality::all();
        $teacher = User::find($id);
        return view('manager.teachers-edit', compact('teacher','nationalities','regions','districts','classes','sections'));
    }

    public function update_teacher(Request $request, User $teacher){
        $teacherDetails = $request->validate([
            'firstname' => 'required|string|max:255',
            'secondname' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:13',
            'phone2' => 'nullable|string|max:13',
            'address' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'nal_id' => 'nullable|exists:nationalities,id',
            'region_id' => 'nullable|exists:regions,id',
            'district_id' => 'nullable|exists:districts,id',
            'section_name' => 'nullable',
            'class_name' => 'nullable',
        ]);

        $teacher->update($teacherDetails);

        return redirect('manager/teachers');
    }

    public function view_notifications(){
        $notifications = Notification::latest()->paginate(10);
        return view('manager.view-nofication', compact('notifications'));
    }

    public function store_drivers(Request $request){
        $driverDetails = $request->validate([
            'salary' => 'nullable',
            'employment_type' => 'nullable|string:255',
            'role_id' => 'required',
            'firstname' => 'required',
            'secondname' => 'nullable',
            'lastname' => 'required',
            'email' => 'nullable',
            'phone' => 'required|max:13',
            'password' => 'required|min:8',
            'dob' => 'nullable',
            'photo' => 'nullable|image|max:2048',
            'gender' => 'nullable',
            'nal_id' => 'nullable',
            'region_id' => 'nullable',
            'district_id' => 'nullable',
            'street' => 'nullable',
            'address' => 'nullable',
        ]);

        if($request->hasFile('photo')){
            $driverDetails['photo'] = $request->file('photo')->store('drivers','public');
        }

        $exisistingDriver = User::where('phone', $request->input('phone'))->first();

        if($exisistingDriver){
            return redirect()->back()->with('msg_io','Account exists!');
        }

        User::create($driverDetails);

        return redirect()->back();
    }

    public function update_driver(Request $request, User $driver){
        $IndriverDetails = $request->validate([
            'salary' => 'required',
            'employment_type' => 'required',
            'role_id' => 'required',
            'firstname' => 'required',
            'secondname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'dob' => 'required',
            'photo' => 'required',
            'gender' => 'required',
            'nal_id' => 'required',
            'region_id' => 'required',
            'district_id' => 'required',
            'street' => 'required',
            'address' => 'required',
        ]);

        if($request->hasFile('photo')){
            $driverDetails['photo'] = $request->file('photo')->store('drivers','public');
        }

        $driver->update($IndriverDetails);

        return redirect()->back();
    }
}
