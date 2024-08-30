<?php

namespace App\Http\Controllers\Parent;

use Carbon\Carbon;
use App\Models\Fee;
use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use App\Models\Region;
use App\Models\SClass;
use App\Models\Message;
use App\Models\Section;
use App\Models\Student;
use App\Models\Activity;
use App\Models\District;
use App\Models\Nationality;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ParentController extends Controller
{
    public function dashboard()
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
        $latestFees = Fee::latest()->take(5)->get();

        return view('parent.dashboard', compact('parents', 'teachers', 'staff', 'drivers', 'user','users','classes','sections','students'));
    }

    public function child_activity($id){
        $nowDate = Carbon::now()->format('Y-m-d');
        $activities = Activity::latest()->paginate(10);
        return view('parent.my-child',[
            'student' => Student::find($id),
        ],compact('activities','nowDate'));
    }

    public function notifications(){
        $nowDate = Carbon::now()->format('Y-m-d');
        $notifications = Notification::latest()->paginate(4);
        $roles = Role::all();
        return view('parent.notifications', compact('notifications','roles','nowDate'));
    }

    public function events(){
        return view('parent.events',[
            'events' => Event::latest()->paginate(5),
        ]);
    }

    public function parent_message(){
        $childIds = Message::select('receiver')->groupBy('receiver')->pluck('receiver');
        $parents = User::where('role_id', 4)->get();
        $nowDate = Carbon::now()->format('Y-m-d');
        $messages = Message::latest()->paginate(5);
        return view('parent/messages', compact('messages','nowDate','parents'));
    }

    public function fees(){
        $nowDate = Carbon::now()->format('Y-m-d');
        $students = Student::all();
        return view('parent.fees', compact('students','nowDate'));
    }

    public function post_fees(Request $request){
        $feesDetails = $request->validate([
            'student_id' => 'required|integer',
            'type' => 'required|string',
            'receipt' => 'nullable|image|max:2048',
            'amount' => 'required',
            // 'status' => 'required|string',
            'due_date' => 'nullable',
            'paid_date' => 'nullable',
            'description' => 'required|string|max:255',
        ]);

        if($request->hasFile('receipt')){
            $feesDetails['receipt'] = $request->file('receipt')->store('receipts','public');
        }

        Fee::create($feesDetails);

        // dd($request->all());

        return redirect()->back()->with('success_uploads','Posted successfully');
    }

    public function edit_fee(Request $request, Fee $fee){
        $statusDetails = $request->validate([
            'status' => 'required',
            'description' => 'required',
        ]);

        $fee->update($statusDetails);

        return redirect()->back()->with('status_updated','Payment details updated!');
    }
}
