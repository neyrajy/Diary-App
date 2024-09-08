<?php

namespace App\Http\Controllers\Driver;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    public function dashboard()
    {
        $events = Event::all();
        return view('driver.dashboard', compact('events'));
    }

    public function view_notifications(){
        return view('driver.view-nofication');
    }

    public function students(){
        return view('driver.students');
    }

    public function events(){
        return view('driver.events');
    }

    public function notifications(){
        return view('driver.notifications');
    }

    public function read_more($id){
        $event = Event::find($id);
        return view('driver.read-more', compact('event'));
    }
}
