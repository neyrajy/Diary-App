@extends('layouts.app')

@section('content')

<x-notification_sent />

    <div class="row-modal mt-3">
        <!-- Calendar -->
        <div class="colom-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{__('Notifications')}}</h5>
                    <div id="calendar" class="calendar-col-5">
                    <form action="/notifications" method="POST" class="event-callendar-col mt-2">
                        @csrf
                        <input type="hidden" name="sender_name" id="" value="{{Auth::guard('web')->user()->firstname}}">
                        <div class="left-opt-col-5">
                            <label for="">Receiver</label><br>
                            <select name="receiver" id="">
                                <option value="">--select receivers--</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                                @endforeach
                            </select>
                            @error('receiver')
                                <br>
                                <span>{{__('Select receivers of this notification!')}}</span>
                            @enderror
                        </div>
                        <div class="middl-event-col-6">
                            <label for="">Title</label><br>
                            <input type="text" name="title" id="">
                            @error('title')
                            <br>
                            <span>{{__('Title of this notification!')}}</span>
                            @enderror
                        </div><br><br><br><br>
                        <div class="right-event-col-7">
                            <label for="">Description</label><br>
                            <textarea name="description" id=""></textarea>
                            @error('description')
                            <br>
                            <span>{{__('Desciption of this notification!')}}</span>
                            @enderror
                        </div><br>
                        <button type="submit" class="submit-event-recorder" style="background-color:#007BFF;">Send</button> <button type="button" class="view-notif" style="color:#FFF; background-color:orange;"><a href="/superadmin/view-nofication">View Notifications</a></button>
                    </form>
                    </div>
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
