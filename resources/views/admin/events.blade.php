@extends('layouts.app')

@section('content')
<h5 class="card-header"> Events Calendar  </h5>
<div id="calendar"></div>
<form action="/events" method="POST" class="event-callendar-col mt-2">
    @csrf
    <input type="hidden" name="sender_name" id="" value="{{Auth::guard('web')->user()->firstname}}">
    <div class="left-opt-col-5">
        <label for="">Date</label><br>
        <input type="date" name="date" id="">
        @error('date')
        <br>
        <span>{{__('Date is required!')}}</span>
        @enderror
    </div>
    <div class="middl-event-col-6">
        <label for="">Event Name</label><br>
        <input type="text" name="event_name" id="">
        @error('event_name')
        <br>
        <span>{{__('Event name is required!')}}</span>
        @enderror
    </div><br><br><br><br>
    <div class="right-event-col-7">
        <label for="">Event Description</label><br>
        <textarea name="event_description" id=""></textarea>
        @error('event_description')
        <br>
        <span>{{__('Short desciption about this event!')}}</span>
        @enderror
    </div><br>
    <button type="submit" class="submit-event-recorder" style="background-color:#007BFF;">Submit Event</button>
</form>

<!-- Include any necessary scripts for the calendar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            // options here
        });
    });
</script>
@endsection
