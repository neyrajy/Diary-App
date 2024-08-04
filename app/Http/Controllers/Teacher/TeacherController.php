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
            'classes' => SClass::all(),
            'sections' => Section::all(),
        ]);
    }

    public function load_to_add_activities($id){
        return view('teacher.add-activity',[
            'user' => User::find($id),
        ]);
    }

    public function store_activities(Request $request){
        $activityDetails = $request->validate([
            'adm_no' => 'required|max:255',
            'teacher_name' => 'required|max:255',
            'date_time' => 'required|max:255',
            'poop_susu' => 'nullable|max:255',
            'nap' => 'nullable|max:255',
            'meals' => 'nullable|max:255',
            'dieppers' => 'nullable|max:255',
            'milk_bottle_feed' => 'nullable|max:255',
            'describe_poop_susu' => 'nullable|max:255',
            'describe_bootle_feed' => 'nullable|max:255',
            'describe_nap' => 'nullable|max:255',
            'describe_meals' =>'nullable|max:255',
            'describe_dieppers' => 'nullable|max:255',
            'describe_bootle_feed' => 'nullable|max:255',
        ]);

        try{
            Activity::create($activityDetails);
            return redirect()->back()->with('success_post_activity','Activity posted successfully');
        }catch(\Throwable $e){
            $e->getMessage();
        }
    }
}
