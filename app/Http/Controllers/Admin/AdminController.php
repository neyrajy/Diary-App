<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Fee;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use App\Models\Event;
use App\Models\Route;
use App\Models\Region;
use App\Models\SClass;
use App\Models\Section;
use App\Models\Student;
use App\Models\District;
use App\Models\Nationality;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showProfile()
    {
        // Get the current admin's details
        $admin = auth()->user(); // Assuming you use Laravel's authentication

        return view('admin.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        // Validate and update admin profile
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'phone' => 'required|string|max:13',
            // Add other fields as necessary
        ]);

        $admin = auth()->user();
        $admin->update($request->all());

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }

    public function showSettings()
    {
        // Get current school settings
        $settings = DB::table('schools')->get();

        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        // Validate and update settings
        $request->validate([
            'next_term_fees_j' => 'required|numeric',
            'next_term_fees_pn' => 'required|numeric',
            'next_term_fees_p' => 'required|numeric',
            'next_term_fees_n' => 'required|numeric',
            'next_term_fees_s' => 'required|numeric',
            'next_term_fees_c' => 'required|numeric',
            // Add other fields as necessary
        ]);

        foreach ($request->all() as $key => $value) {
            DB::table('schools')->where('type', $key)->update(['description' => $value]);
        }

        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');
    }


    public function dashboard()
    {
        // $latestFees = Fee::all();
        $parentsCount = User::where('role_id', 4)->count();
        $teachersCount = User::where('role_id', 5)->count();
        $staffCount = User::where('role_id', 7)->count();
        $driversCount = User::where('role_id', 7)->count();
        $events = Event::latest()->paginate(1);
        // $notifications = Notification::latest()->take(5)->get();
        $studentsCount = Student::count(); 
        $driversCount = User::where('role_id', 7)->count();
        $students = Student::all(); 
        $latestFees = Fee::latest()->take(5)->get();
        return view('admin.dashboard', compact('parentsCount', 'teachersCount', 'staffCount', 'studentsCount', 'driversCount','students', 'latestFees','events'));
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
        

        return view('admin.register-parent', compact('nationalities', 'regions', 'districts', 'students', 'classes', 'sections','users'),[
            'studentsViewer' => $studentsViewer,
            // 'students' => $students,
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
            'nationality_id' => 'nullable|exists:nationalities,id',
            'region' => 'nullable|exists:regions,id',
            'district' => 'nullable|exists:districts,id',
            'street' => 'nullable|string|max:255',
            'guardian' => 'nullable|boolean',
            'student' => 'nullable|integer',
            'student2' => 'nullable|integer',
        ]);
        

        $photoPath = $request->hasFile('photo') ? $request->file('photo')->store('photos', 'public') : 'backend/assets/images/users/avatar-1.jpg';
        // if ($request->child) {
        // $student = Student::find($request->child);
        // $student->parent_id = $parent->id; 
        // $student->save();
        // }
        // Create a new parent user
        $user = User::create([
            'student2' => $request->student2,
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
        return redirect()->route('admin.parents')->with('success', 'Parent registered successfully.');
    }
    public function parents() {
        $fees = Fee::latest()->get();
        $parentsCount = User::where('role_id', 4)->count();
        $parents = User::where('role_id', 4)->filter(request(['search']))->paginate(10);
        $students = Student::all();
        return view('admin.parents', compact('parentsCount', 'parents','students','fees'));
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
        $parent = User::where('role_id', 4)->findOrFail($id);
        $nationalities = Nationality::all();
        $regions = Region::all();
        $districts = District::all();
        $classes = SClass::all();
        $sections = Section::all();
        $students = Student::all();

        return view('admin.edit-parent', compact('parent', 'nationalities', 'regions', 'districts', 'classes', 'sections', 'students'));
    }
    public function getSectionsByClass(Request $request)
{
    $classId = $request->input('class_id');
    
    // Fetch sections based on class
    $sections = Section::where('s_class_id', $classId)->get();
    
    return response()->json($sections);
}

    // Add method to fetch students by class and section
    public function getStudentsByClassSection(Request $request)
    {
        $classId = $request->input('class_id');
        $sectionId = $request->input('section_id');
    
        $students = Student::where('s_class_id', $classId)
                            ->where('section_id', $sectionId)
                            ->get();
    
        return response()->json($students);
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
            'nationality_id' => 'nullable|exists:nationalities,id',
            'region_id' => 'nullable|exists:regions,id',
            'district_id' => 'nullable|exists:districts,id',
            'class' => 'nullable',
            'section' => 'nullable',
            'student' => 'nullable',
            'student2' => 'nullable',
            'role_id' => 'required',
        ]);

        // Find the parent record by ID
        $parent = User::findOrFail($id);

        // Update the parent record with validated data
       
        $parent->update($parentDeails);
        return redirect()->route('admin.parents')
            ->with('success', 'Parent updated successfully.');
    }
    public function destroyParent($id)
    {
        // Find the parent record by ID
        $parent = User::findOrFail($id);

        // Delete the parent record
        $parent->delete();

        // Redirect back to the page with a success message
        return redirect()->route('admin.parents')->with('success', 'Parent deleted successfully.');
    }
    public function students() {
        $studentsCount = Student::count(); 
        $students = Student::all();
        $classes = SClass::all();
        $sections = Section::all();
        $teachers = User::where('role_id', 5)->get(); // Fetching teachers with role_id 5

        return view('admin.students', compact('studentsCount', 'students', 'classes', 'sections', 'teachers'));
    }

    //Teachers
    public function teachers() {
        $teachersCount = User::where('role_id', 5)->count();
        $teachers = User::where('role_id', 5)->get();
        $sections = Section::all();
        $classes = SClass::all();
        return view('admin.teachers', compact('teachersCount', 'teachers','sections','classes'));
    }
    public function editTeacher($id)
    {
        // Find the parent record by ID
        $teacher = User::where('role_id', 5)->findOrFail($id);
        $nationalities = Nationality::all();
        $regions = Region::all();
        $districts = District::all();

        $sections = Section::all();
        $classes = SClass::all();
           
        return view('admin.edit-teacher', compact('classes','sections','teacher','nationalities', 'regions', 'districts'));
    }
    public function updateTeacher(Request $request, User $teacher)
    {
        // Validate incoming request data
        $teacherDetails = $request->validate([
            'firstname' => 'required|string|max:255',
            'secondname' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:13',
            'phone2' => 'nullable|string|max:13',
            'address' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'nationality_id' => 'nullable|exists:nationalities,id',
            'region_id' => 'nullable|exists:regions,id',
            'district_id' => 'nullable|exists:districts,id',
            'section_name' => 'nullable',
            'class_name' => 'nullable',
        ]);

        $teacher->update($teacherDetails);


        return redirect()->route('admin.teachers')->with('success', 'Teacher updated successfully.');
            
    }
    public function destroyTeacher($id)
    {
        // Find the teacher record by ID
        $teacher = User::findOrFail($id);

        // Delete the teacher record
        $teacher->delete();

        // Redirect back to the page with a success message
        return redirect()->route('admin.teachers')->with('success', 'Teacher deleted successfully.');
    }

    public function staff() {
        $nationalities = Nationality::all();
        $regions = Region::all();
        $districts = District::all();
        $staffs = User::where('role_id', 7)->orderBy('id','asc')->paginate(10);
        return view('admin.staff', compact('staffs','nationalities','regions','districts'));
    }


    public function drivers() {
        $nationalities = Nationality::all();
        $regions = Region::all();
        $districts = District::all();
        $drivers = User::where('role_id', 6)->orderBy('id','asc')->paginate(10);
        return view('admin.drivers', compact('nationalities','regions','districts','drivers'));
    }

    public function events() {
        
        return view('admin.events');
    }

    public function notifications() {
        $roles = Role::all();
        return view('admin.notifications', compact('roles'));
    }

    public function store_events(Request $request){
        $eventDetails = $request->validate([
            'event_name' => 'required',
            'date' => 'required',
            'event_description' => 'required',
            'sender_name' => 'required',
        ]);

        try{
            Event::create($eventDetails);
            return redirect()->back()->with('success_event_sent', 'Event posted successfully!');
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function view_single_event($id){
        $event = Event::find($id);
        return view('admin.read-more',[
            'event' => $event,
        ]);
    }


    public function register_student(){
        $studentsCount = Student::all();
        return view('admin.register-student',[
            'studentsCount' => $studentsCount,
            'students' => Student::all(),
            'classes' => SClass::all(),
            'sections' => Section::all(),
        ]);
    }


    public function store_students(Request $request){

        if (!Auth::user()->role_id === 1 && !Auth::user()->role_id === 2) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access');
        }
    
        $studentsDetails = $request->validate([
            'firstname' => 'required|max:255',
            'secondname' => 'nullable|max:255',
            'lastname' => 'required|max:255',
            's_class_id' => 'required',
            'section_id' => 'required',
            'adm_no' => 'required|max:30',
            'photo' => 'nullable',
            'bg_id' => 'nullable',
            'session' => 'required',
            'age' => 'nullable',
            'admission_date' => 'nullable',
            'grad' => 'required',
            'grad_date' => 'nullable',
        ]);
    
        $exisistingStudent = Student::where('adm_no', $request->input('adm_no'))->first();
    
        if ($exisistingStudent) {
            return redirect()->back()->withErrors('student_exists', 'This Student exists already!')->withInput();
        }
    
        if ($request->hasFile('photo')) {
            $studentsDetails['photo'] = $request->file('photo')->store('photos', 'public');
        }
    
        Student::create($studentsDetails);
    
        return redirect()->back()->with('success_registration', 'Student registered successfully');
    }

    public function register_teacher(){
        return view('/admin/register-teacher',[
            'nationalities' => Nationality::all(),
            'regions' => Region::all(),
            'disctricts' => District::all(),
            'classes' => SClass::all(),
            'sections' => Section::all(),
        ]);
    }

    public function store_teachers(Request $request){
        $teachersDetails = $request->validate([
            'firstname' => 'required|max:255|min:3',
            'secondname' => 'nullable|max:255|min:3',
            'lastname' => 'required|max:255|min:3',
            'phone' => 'required|max:13|min:10',
            'phone2' => 'nullable|max:13|min:10',
            'nationality_id' => 'nullable|integer',
            'region_id' => 'nullable|integer',
            'district_id' => 'nullable|integer',
            'street' => 'nullable|string|max:255|min:3',
            'address' => 'nullable|max:255|min:3',
            'password' => 'required|min:8|max:255',
            'confirm_password' => 'required|min:8|max:255',
            'guardian' => 'required',
            'role_id' => 'required', 
            'section_name' => 'required',
            'class_name' => 'required',
        ]);

        if($teachersDetails['password'] != $teachersDetails['confirm_password']){
            return redirect()->back()->withErrors('Passwords do not match!')->withInput();
        }

        try{
            User::create($teachersDetails);
            return redirect()->back()->with('success_teacher_reg','Teacher registered successfully!');
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function store_notifications(Request $request){
        $notificationDetails = $request->validate([
            'sender_name' => 'required|max:255',
            'receiver' => 'required|integer|max:9',
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        Notification::create($notificationDetails);
        return redirect()->back()->with('notification_sent','Notification sent successfully!');
    }

    public function view_notifications(){
        $notifications = Notification::latest()->paginate(5);
        $roles = Role::all();
        return view('admin.view-nofication', compact('notifications','roles'));
    }
    
    public function view_parent($id){
        $students = Student::all();
        $parent = User::where('role_id', 4)->find($id);
        return view('admin/view-parent', compact('parent','students'));
    }

    public function all_users(){
        $roles = Role::all();
        $users = User::where('role_id' , '!=', 1)->paginate(10);
        $usersCounter = User::where('role_id' , '!=', 1)->count();
        return view('admin/users', compact('users','usersCounter','roles'));
    }

    public function edit_user_role(Request $request, User $user){
        $userRole = $request->validate([
            'role_id' => 'required',
        ]);
        $user->update($userRole);
        return redirect()->back();
    }
    public function register_staff(){
        return view('/admin/register-staff',[
            'nationalities' => Nationality::all(),
            'regions' => Region::all(),
            'disctricts' => District::all(),
            'classes' => SClass::all(),
            'sections' => Section::all(),
        ]);
    }
    public function store_staff(Request $request){
        $staffDetails = $request->validate([
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
            'nationality_id' => 'nullable',
            'region_id' => 'nullable',
            'district_id' => 'nullable',
            'street' => 'nullable',
            'address' => 'nullable',
        ]);

        if($request->hasFile('photo')){
            $staffDetails['photo'] = $request->file('photo')->store('staffs','public');
        }
        
        $exisistingStaff = User::where('phone', $request->input('phone'))->first();
        if($exisistingStaff){
            return redirect()->back()->withInput('Account exists!')->inputError();
        }
        

        User::create($staffDetails);
        // dd($request->all());
        return redirect()->back();
    }

    public function delete_staff(Request $request, User $staff){
        $staff->delete();
        return redirect()->back();
    }

    public function edit_staff(Request $request, User $staff){
        $staffData = $request->validate([
            'salary' => 'required',
            'employment_type' => 'required',
            'role_id' => 'required',
            'firstname' => 'required',
            'secondname' => 'nullable',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'dob' => 'required',
            'photo' => 'required',
            'gender' => 'required',
            'nationality_id' => 'required',
            'region_id' => 'required',
            'district_id' => 'required',
            'street' => 'required',
            'address' => 'required',
        ]);

        $staff->update($staffData);

        dd($request->all());

        // return redirect()->back();
    }

    public function store_driver(Request $request){
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
            'nationality_id' => 'nullable',
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
    
    public function cars(){
        $carDriver = User::where('role_id', 6)->select('id')->orderBy('id','asc')->get();
        $cars = Car::where('driverid','!=', $carDriver)->get();
        $drivers = User::where('role_id', 6)->get();
        $routes = Route::all();
        return view('admin.cars', compact('drivers','cars','routes'));
    }

    public function routes(){
        $routes = Route::all();
        return view('admin.routes', compact('routes'));
    }

    public function teacher_activities(Request $request, $id){

        $sections = Section::all();

        $classes = SClass::all();

        $todayDate = Carbon::now()->format('Y-m-d');
        $tasks = Task::filter(request(['search']))->get();

        if($request->has(['fromDate','toDate']) && $request->fromDate != "" && $request->toDate != ""){
            $searchFrom = $request->fromDate;
            $searchTo = $request->toDate;

            $tasks = Task::whereBetween('created_at', [$searchFrom,$searchTo])->get();
        }

        $teacher = User::find($id);

        return view('admin.teachers-activities', compact('teacher','tasks','todayDate','sections','classes'));
    }
    
    public function regions()
    {
        $regions = Region::all();
        return response()->json($regions);
    }

    public function getDistricts($regionId)
    {
        $region = Region::findOrFail($regionId);
        $districts = $region->districts; 
        return response()->json($districts);
    }

}
