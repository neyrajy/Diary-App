@extends('layouts.app')

@section('content')

<x-notification_sent />

    <div class="row-modal mt-3">
        <!-- Calendar -->
        <div class="colom-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{__('View Notifications')}}</h5>
                    @foreach($notifications as $notification)
                    <div id="calendar" class="calendar-col-7">
                    <h1><strong>Title:</strong> {{$notification->title}}</h1>
                    @foreach($roles as $role)
                    @if($role->id == $notification->receiver)
                    <h1><strong>Target:</strong> {{$role->role_name}}</h1>
                    <p><strong>Date Sent:</strong> {{$notification->created_at}}</p>
                    <p><strong>Body:</strong> {{$notification->description}}</p>
                    @endif
                    @endforeach
                    </div><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            // options here
        });
    });
</script>
@endsection
