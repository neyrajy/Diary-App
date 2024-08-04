<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\KJDAHelpers;
use App\Models\Nationality;
use App\Models\Region;
use App\Models\District;
use App\Models\Student;
use App\Models\SClass;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class SuperAdminController extends Controller
{
    //Parents
    public function dashboard()
    {
        $parentsCount = User::where('role_id', 4)->count();

        $teachersCount = User::where('role_id', 5)->count();
        $staffCount = User::where('role_id', 7)->count();
        $studentsCount = User::where('role_id', 8)->count();
        $driversCount = User::where('role_id', 7)->count();
        $studentsViewer = User::where('role_id',8)->get();
        // $notifications = Notification::latest()->take(5)->get();
        // $latestFees = Fee::latest()->take(5)->get();

        return view('superadmin.dashboard', compact('parentsCount', 'teachersCount', 'staffCount', 'studentsCount', 'driversCount','studentsViewer'));
    }
    // methods for parents routes
    public function showParentRegistrationForm()
    {
        $nationalities = Nationality::all();
        $regions = Region::all();
        $districts = District::all();
        $students = Student::all();
        $classes = SClass::all();
        $sections = Section::all();
        $users = User::all();
        $studentsViewer = User::where('role_id',8)->get();

        return view('superadmin.register-parent', compact('nationalities', 'regions', 'districts', 'students', 'classes', 'sections','users'),[
            'studentsViewer' => $studentsViewer,
        ]);
    }

    // Method to handle parent registration

    public function registerParent(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'firstname' => 'required|string|max:255',
            'secondname' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users',
            'phone' => 'required|string|max:11|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone2' => 'nullable|string|max:13|unique:users',
            'gender' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string|max:255',
            'nal_id' => 'nullable|exists:nationalities,id',
            'region' => 'nullable|exists:regions,id',
            'district' => 'nullable|exists:districts,id',
            'street' => 'nullable|string|max:255',
            'guardian' => 'nullable|boolean',
            'student' => 'nullable|integer',
        ]);

        $photoPath = $request->hasFile('photo') ? $request->file('photo')->store('photos', 'public') : 'backend/assets/images/users/avatar-1.jpg';
        // if ($request->child) {
        // $student = Student::find($request->child);
        // $student->parent_id = $parent->id; 
        // $student->save();
        // }
        // Create a new parent user
        $user = User::create([
            'student' => $request->student,
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'phone2' => $request->phone2,
            'gender' => $request->gender,
            'photo' => $photoPath,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'nationality' => $request->nationality,
            'region' => $request->region,
            'district' => $request->district,
            'street' => $request->street,
            'guardian' => $request->guardian ?? false,
            'role_id' => 4, // 4 is the role_id for parents
            'verified' => true,
        ]);
        return redirect()->route('superadmin.parents')->with('success', 'Parent registered successfully.');
    }
    public function parents() {
        $parentsCount = User::where('role_id', 4)->count();
        $parents = User::where('role_id', 4)->get();
        return view('superadmin.parents', compact('parentsCount', 'parents'));
    }
    public function verifyParent($id)
    {
        $parent = User::find($id);

        if ($parent) {
            $parent->verified = true;
            $parent->verified_at = now();
            $parent->verified_by = Auth::id();
            $parent->save();

            return redirect()->back()->with('success', 'Parent verified successfully.');
        }

        return redirect()->back()->with('error', 'Parent not found.');
    }
    public function editParent($id)
    {
        // Find the parent record by ID
        $parent = User::where('role_id', 4)->findOrFail($id);
        $nationalities = Nationality::all();
        $regions = Region::all();
        $districts = District::all();
        $classes = SClass::all();
        $sections = Section::all();
        $users = User::where('role_id',8)->get();
           
        return view('superadmin.edit-parent', compact('parent','nationalities', 'regions', 'districts','classes','sections','users'));
    }
    public function updateParent(Request $request, $id)
    {
        // Validate incoming request data
        $parentDeails = $request->validate([
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
            'class' => 'nullable',
            'section' => 'nullable',
            'student' => 'nullable',
            'role_id' => 'required',
        ]);

        // Find the parent record by ID
        $parent = User::findOrFail($id);

        // Update the parent record with validated data
       
        $parent->update($parentDeails);
        return redirect()->route('superadmin.parents')
            ->with('success', 'Parent updated successfully.');
    }
    public function destroyParent($id)
    {
        // Find the parent record by ID
        $parent = User::findOrFail($id);

        // Delete the parent record
        $parent->delete();

        // Redirect back to the page with a success message
        return redirect()->route('superadmin.parents')->with('success', 'Parent deleted successfully.');
    }
    public function students() {
        $studentsCount = User::where('role_id', 8)->count();
        $students = User::where('role_id', 8)->get();
        $classes = SClass::all();
        $sections = Section::all();
        
        return view('superadmin.students', compact('studentsCount', 'students', 'classes', 'sections'));
    }

    //Teachers
    public function teachers() {
        $teachersCount = User::where('role_id', 5)->count();
        $teachers = User::where('role_id', 5)->get();
        return view('superadmin.teachers', compact('teachersCount', 'teachers'));
    }
    public function editTeacher($id)
    {
        // Find the parent record by ID
        $teacher = User::where('role_id', 5)->findOrFail($id);
        $nationalities = Nationality::all();
        $regions = Region::all();
        $districts = District::all();
           
        return view('superadmin.edit-teacher', compact('teacher','nationalities', 'regions', 'districts'));
    }
    public function updateTeacher(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
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
        ]);

        // Find the teacher record by ID
        $parent = User::findOrFail($id);

        // Update the teacher record with validated data
       
        $parent->update($request->only([
            'firstname', 'lastname', 'phone', 'phone2', 'address', 'street', 
            'nal_id', 'region_id', 'district_id'
        ]));
        return redirect()->route('superadmin.teachers')
            ->with('success', 'Teacher updated successfully.');
    }
    public function destroyTeacher($id)
    {
        // Find the teacher record by ID
        $teacher = User::findOrFail($id);

        // Delete the teacher record
        $teacher->delete();

        // Redirect back to the page with a success message
        return redirect()->route('superadmin.teachers')->with('success', 'Teacher deleted successfully.');
    }

    public function staff() {
        // return view for staff
    }


    public function drivers() {
        // return view for drivers
    }

    public function events() {
        // return view for events
    }

    public function notifications() {
        // return view for notifications
    }

    public function fees() {
        // return view for fees
    }

    public function register_student(){
        $studentsCount = Student::all();
        return view('superadmin.register-student',[
            'studentsCount' => $studentsCount,
            'students' => Student::all(),
            'classes' => SClass::all(),
            'sections' => Section::all(),
        ]);
    }

    public function store_students(Request $request){
        $studentsDetails = $request->validate([
            'adm_no' => 'nullable',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'dob' => 'nullable',
            'gender' => 'nullable',
            'password' => 'required',
            'class_id' => 'nullable',
            'section_id' => 'nullable',
            'photo' => 'nullable',
            'role_id' => 'required',
        ]);

        $exisistingStudentFName = User::where('firstname', $request->input('firstname'))->first();
        $exisistingStudentLName = User::where('lastname', $request->input('lastname'))->first();

        if($exisistingStudentFName && $exisistingStudentLName){
            return redirect()->back()->with('student_exists','This Student exists already!');
        }

        if($request->hasFile('photo')){
            $studentsDetails['photo'] = $request->file('photo')->store('phptos','public');
        }

        User::create($studentsDetails);

        return redirect()->back()->with('success_registration','Student registered successfully');
    }
}
