<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Activity;
use App\Models\SClass;
use App\Models\Section;
use Carbon\Carbon;


class TeacherController extends Controller
{
    public function dashboard()
    {
        $nowDate = Carbon::now()->format('Y-m-d');

        $activities = Activity::whereDate('date_time', $nowDate)->latest()->filter(request(['search']))->paginate(10);

        $parent = User::where('role_id','==','4')->count();
        
        return view('teacher.dashboard',[
            'students' => Student::all(),
            'parentCounter' => $parent,
            'activities' => Activity::all(),
            'student_activities' => $activities,
            'users' => User::all(),
        ],compact('nowDate'));
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
}
