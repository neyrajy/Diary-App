<?php

namespace App\Http\Controllers\Teacher;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use App\Models\SClass;
use App\Models\Message;
use App\Models\Section;
use App\Models\Student;
use App\Models\Activity;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TeacherController extends Controller
{
    public function dashboard()
    {
        $nowDate = Carbon::now()->format('Y-m-d');

        $activities = Activity::whereDate('date_time', $nowDate)->filter(request(['search']))->paginate(10);

        $parent = User::where('role_id', 4)->count();
        
        return view('teacher.dashboard',[
            'students' => Student::all(),
            'parentCounter' => $parent,
            'activities' => Activity::all(),
            'student_activities' => $activities,
            'users' => User::all(),
        ], compact('nowDate','activities'));
    }

    public function student_activities(){
        $studentExists = User::where('role_id','==','8')->count();
        return view('teacher.activity',[
            'students' => Student::all(),
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
        return view('teacher.edit-activity',compact('activity','student'));
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
}

