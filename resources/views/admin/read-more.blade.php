@extends('layouts.app')

@section('content')

<h5 class="card-header">Events Calendar</h5>
<div id="calendar" class="calendar-col-5">
<h3><strong>Date:</strong> <span style="color:green;">{{$event->date}}</span></h3>
<h3><strong>Event:</strong> <span style="color:green;">{{$event->event_name}}</span></h3>
<p><strong>Description:</strong> <span style="color:orange;">{{$event->event_description}}</span></p>
<p><strong>Posted On: {{$event->created_at->format('Y-m-d')}}</strong></p>
<p><strong>Posted By: {{$event->sender_name}}</strong></p>
  
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
