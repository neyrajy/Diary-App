@extends('layouts.app')

@section('content')


    <div class="row-modal mt-3">
        <!-- Calendar -->
        <div class="colom-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Events Calendar</h5>
                    <div id="calendar"></div>
                </div>
            </div>
            <form action="/events" method="POST" class="event-callendar-col mt-2">
                @csrf
                <input type="hidden" name="sender_name" id="" value="{{Auth::guard('web')->user()->firstname}}">
                <div class="left-opt-col-5">
                    <label for="">Date</label><br>
                    <input type="date" name="date" id="">
                </div>
                <div class="middl-event-col-6">
                    <label for="">Event Name</label><br>
                    <input type="text" name="event_name" id="">
                </div><br><br><br><br>
                <div class="right-event-col-7">
                    <label for="">Event Description</label><br>
                    <textarea name="event_description" id=""></textarea>
                </div><br>
                <button type="submit" class="submit-event-recorder">Submit Event</button>
            </form>
        </div>
    </div>


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
