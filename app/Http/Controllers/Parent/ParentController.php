<?php

namespace App\Http\Controllers\Parent;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Region;
use App\Models\SClass;
use App\Models\Section;
use App\Models\Student;
use App\Models\Activity;
use App\Models\District;
use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ParentController extends Controller
{
    public function dashboard()
    {
        {
            $users = User::all();
            $user = Auth::user();
            $students = Student::all();
            $parents = User::where('role_id', 4)->count();
            $teachers = User::where('role_id', 5)->count();
            $staff = User::where('role_id', 7)->count();
            // $studentsCount = User::where('role_id', 6)->count();
            $drivers = User::where('role_id', 7)->count();
            $classes = SClass::all();
            $sections = Section::all();
            // $notifications = Notification::latest()->take(5)->get();
            // $latestFees = Fee::latest()->take(5)->get();
    
            return view('parent.dashboard', compact('parents', 'teachers', 'staff', 'drivers', 'user','users','classes','sections','students'));
        }
    }

    public function child_activity($id){
        $nowDate = Carbon::now()->format('Y-m-d');
        $activities = Activity::latest()->paginate(10);
        return view('parent.my-child',[
            'student' => Student::find($id),
        ],compact('activities','nowDate'));
    }
}
