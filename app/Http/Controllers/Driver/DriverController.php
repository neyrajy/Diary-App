<?php

namespace App\Http\Controllers\Driver;

use App\Models\Car;
use App\Models\Event;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    public function dashboard()
    {
        $routes = Route::all();
        $cars = Car::all();
        $events = Event::all();
        return view('driver.dashboard', compact('events','cars','routes'));
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
