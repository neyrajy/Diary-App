<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fee;
use App\Models\User;
use App\Models\Event;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $latestFees = Fee::all();
        $parentsCount = User::where('role_id', 4)->count();

        $teachersCount = User::where('role_id', 5)->count();
        $staffCount = User::where('role_id', 7)->count();
        $driversCount = User::where('role_id', 7)->count();
        $events = Event::latest()->paginate(1);
        // $notifications = Notification::latest()->take(5)->get();
        $studentsCount = Student::count(); 
        $driversCount = User::where('role_id', 7)->count();
        $studentsViewer = Student::all(); 
        return view('admin.dashboard' , compact('parentsCount', 'teachersCount', 'staffCount', 'studentsCount', 'driversCount','studentsViewer', 'latestFees','events'));
    }
}
