<?php

namespace App\Http\Controllers\Manager;

use App\Models\User;
use App\Models\Event;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    public function dashboard()
    {
        $staffs = User::where('role_id', 7)->get();
        $employees = User::where('role_id',6)->get();
        $events = Event::latest()->paginate(1);
        $parentsCount = User::where('role_id',4)->count();
        $teachersCount = User::where('role_id',5)->count();
        $studentsCount = Student::count();
        $driversCount = User::where('role_id',6)->count();
        $staffCount = User::where('role_id', 7)->count();
        return view('manager.dashboard', compact('parentsCount','teachersCount','studentsCount','driversCount','staffCount','events','employees','staffs'));
    }

    public function parents(){
        return view('manager.parents');
    }
}
