<?php

namespace App\Http\Controllers\Teacher;

use Carbon\Carbon;
use App\Models\Fee;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use App\Models\Event;
use App\Models\Region;
use App\Models\SClass;
use App\Models\Message;
use App\Models\Section;
use App\Models\Student;
use App\Models\Activity;
use App\Models\District;
use App\Models\Attendance;
use App\Models\Nationality;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class TeacherController extends Controller
{
    public function dashboard()
    {
        $nowDate = Carbon::now()->format('Y-m-d');

        $activities = Activity::whereDate('date_time', $nowDate)->filter(request(['search']))->paginate(10);

        $activityCounter = Activity::whereDate('date_time', $nowDate)->count();

        $parent = User::where('role_id', 4)->count();
        
        return view('teacher.dashboard',[
            'students' => Student::all(),
            'parentCounter' => $parent,
            'activities' => Activity::all(),
            'student_activities' => $activities,
            'users' => User::all(),
        ], compact('nowDate','activities','activityCounter'));
    }

    public function student_activities(){
        $studentExists = User::where('role_id','==','8')->count();
        return view('teacher.activity',[
            'students' => Student::orderBy('id','asc')->filter(request(['search']))->paginate(10),
            'users' => User::all(),
            'activities' => Activity::all(),
            'studentExistsConuter' => $studentExists,
            's_classes' => SClass::all(),
            'sections' => Section::all(),
        ]);
    }

    public function load_to_add_activities($id){
        return view('teacher.add-activity',[
            'student' => Student::find($id),
        ]);
    }

    public function store_activities(Request $request){
        $activityDetails = $request->validate([
            'student_id' => 'required',
            'date_time' => 'required',
            'mood' => 'nullable',
            'learning_activities' => 'nullable|max:255',
            'lessons_learnt' => 'nullable|max:255',
            'needs_more_time' => 'nullable|max:255',
            'milk_times' => 'nullable',
            'milk_finished' => 'nullable',
            'breakfast' => 'nullable',
            'breakfast_quantity' => 'nullable',
            'breakfast_finished' => 'nullable',
            'lunch' => 'nullable',
            'lunch_quantity' => 'nullable',
            'lunch_finished' => 'nullable',
            'snack' => 'nullable',
            'snack_quantity' => 'nullable',
            'snack_finished' => 'nullable',
            'general_observation' => 'nullable|max:255',
            'poop' => 'nullable',
            'describe_poop' => 'nullable',
            'nap' => 'nullable',
            'diapers_used' => 'nullable',
            'photos' => 'nullable',
            'videos' => 'nullable',
            'milestones' => 'nullable|max:255',
        ]);

        if($request->hasFile('photos')){
            $activityDetails['photos'] = $request->file('photos')->store('photos','public');
        }

        if($request->hasFile('videos')){
            $activityDetails['videos'] = $request->file('videos')->store('videos','public');
        }

        // try{
            Activity::create($activityDetails);
            return redirect()->back()->with('success_post_activity','Activity posted successfully');
        // }catch(\Throwable $e){
        //     $e->getMessage();
        // }
    }

    public function edit_activity($id){
        $activity = Activity::find($id);
        $student = Student::where('id', $activity->student_id)->get();
        return view('teacher.edit-activity', compact('activity','student'));
    }

    public function notifications(){
        $nowDate = Carbon::now()->format('Y-m-d');
        $notifications = Notification::latest()->paginate(3);
        $roles = Role::all();
        return view('teacher.notifications', compact('notifications','roles','nowDate'));
    }

    public function events(){
        $events = Event::latest()->paginate(3);
        return view('teacher.events', compact('events'));
    }

    public function view_activity($id){
        $nowDate = Carbon::now()->format('Y-m-d');
        $activity = Activity::find($id);
        return view('teacher.view-activity', compact('activity','nowDate'));
    }

    public function notify(){
        $students = Student::all();
        return view('teacher.message', compact('students'));
    }

    public function store_messages(Request $request){
        $messageComponents = $request->validate([
            'sender_name' => 'required',
            'receiver' => 'required',
            'message_category' => 'required',
            'message_body' => 'required',
        ]);

        Message::create($messageComponents);

        return redirect('teacher/view-message')->with('message_stored','Message sent successfuly to' . $messageComponents['receiver']);
    }

    public function view_messages(){
        return view('teacher.view-message');
    }

    public function attendance(){
        $students = Student::all();
        $nowDate = Carbon::now()->format('Y-m-d');
        return view('teacher.attendance',compact('nowDate','students'));
    }

    public function attendance_post(Request $request)
    {
        $attendanceDetails = $request->validate([
            'teacher_id.*' => 'nullable',
            'student_name.*' => 'required|string|max:255',
            'present.*' => 'nullable|integer',
            'absent.*' => 'nullable|integer',
        ]);

        $teacherId = $attendanceDetails['teacher_id'] ?? null;
        $studentName = $attendanceDetails['student_name'] ?? [];
        $present = $attendanceDetails['present'] ?? [];
        $absent = $attendanceDetails['absent'] ?? [];

        foreach ($studentName as $index => $name) {
            Attendance::create([
                'teacher_id' => $teacherId[$index] ?? null,
                'student_name' => $name,
                'present' => $present[$index] ?? 0,
                'absent' => $absent[$index] ?? 0,
            ]);
        }

        return redirect('/teacher/viw-attendance')->with('attendance_sent', 'Attendance submitted successfully');
    }


    public function view_attendance(){
        $nowDate = Carbon::now()->format('Y-m-d');
        $attendances = Attendance::whereDate('created_at', $nowDate)->get();
        return view('teacher.viw-attendance', compact('attendances','nowDate'));
    }

    public function students(){
        $students = Student::orderBy('id','asc')->get();
        return view('teacher.students', compact('students'));
    }

    public function edit_post_activity(Request $request, Activity $activity){
        $postedActivity = $request->validate([
            'student_id' => 'required',
            'date_time' => 'required',
            'mood' => 'nullable',
            'learning_activities' => 'nullable|max:255',
            'lessons_learnt' => 'nullable|max:255',
            'needs_more_time' => 'nullable|max:255',
            'milk_times' => 'nullable',
            'milk_finished' => 'nullable',
            'breakfast' => 'nullable',
            'breakfast_quantity' => 'nullable',
            'breakfast_finished' => 'nullable',
            'lunch' => 'nullable',
            'lunch_quantity' => 'nullable',
            'lunch_finished' => 'nullable',
            'snack' => 'nullable',
            'snack_quantity' => 'nullable',
            'snack_finished' => 'nullable',
            'general_observation' => 'nullable|max:255',
            'poop' => 'nullable',
            'describe_poop' => 'nullable',
            'nap' => 'nullable',
            'diapers_used' => 'nullable',
            'photos' => 'nullable',
            'videos' => 'nullable',
            'milestones' => 'nullable|max:255',
        ]);

        $activity->update($postedActivity);

        return redirect()->back();
    }

    public function parents(){
        $fees = Fee::latest()->get();
        $parentsCount = User::where('role_id', 4)->count();
        $parents = User::where('role_id', 4)->filter(request(['search']))->paginate(10);
        $students = Student::all();
        return view('teacher.parents', compact('parentsCount', 'parents','students','fees'));
    }

    public function drivers(){
        $nationalities = Nationality::all();
        $regions = Region::all();
        $districts = District::all();
        $drivers = User::where('role_id', 6)->orderBy('id','asc')->paginate(10);
        return view('teacher.drivers', compact('nationalities','regions','districts','drivers'));
    }

    public function my_activities(){
        $tasks = Task::where('teacher_id', Auth::guard()->user()->id)->orderBy('id','desc')->get();
        return view('teacher.my_activities', compact('tasks'));
    }

    public function store_tasks(Request $request){
        $taskDetails = $request->validate([
            'teacher_id' => 'required|integer',
            'lesson_title' => 'required',
            'objectives' => 'required',
            'materials_needed' => 'required',
            'class' => 'required|integer',
            'section' => 'required|integer',
        ]);

        Task::create($taskDetails);

        // dd($request->all());

        return redirect()->back();
    }
}
