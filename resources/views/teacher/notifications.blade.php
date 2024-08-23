@extends('layouts.app')

@section('content')
<div class="row-modal mt-3">
    <!-- Calendar -->
    <div class="colom-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{__('View Notifications')}}</h5>
                @foreach($notifications as $notification)
                @if(Auth::guard('web')->user()->role_id == $notification->receiver)
                <div id="calendar" class="calendar-col-7">
                <h1><strong>Title:</strong> {{$notification->title}}</h1>
                @foreach($roles as $role)
                @if($role->id == $notification->receiver)
                <h1><strong>Target:</strong> {{$role->role_name}}</h1>
                @if($nowDate == $notification->created_at->format('Y-m-d'))
                <p><strong>Date Sent:</strong> {{$notification->created_at}} <span style="color:red; font-style:italic;"><i class="fa fa-comments"></i> new notification</span></p>
                @else
                <p><strong>Date Sent:</strong> {{$notification->created_at}} <span style="color:green; font-style:italic;"><i class="fa fa-comments"></i> old notification</span></p>
                @endif
                <p><strong>Body:</strong> {{$notification->description}}</p>
                @endif
                @endforeach
                </div><br>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
