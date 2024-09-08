<?php

namespace App\Http\Controllers\Staff;

use App\Models\Event;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function dashboard()
    {
        $events = Event::latest()->paginate(1);
        return view('staff.dashboard', compact('events'));
    }

    public function notifications(){
        return view('staff.notifications');
    }

    public function events(){
        return view('staff.events');
    }

    public function view_notifications(){
        $notifications = Notification::all();
        return view('.staff.view-nofication', compact('notifications'));
    }

    public function read_more_event($id){
        $event = Event::find($id);
        return view('staff.read-more', compact('event'));
    }
}
