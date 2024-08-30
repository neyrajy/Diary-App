@extends('layouts.app')

@section('content')

<x-success_event_sent />
    
    <div class="row py-3">
        <!-- Parents Card -->
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Parents</h5>
                    <p class="card-text">{{ $parentsCount }}</p>
                    <a href="{{ route('superadmin.parents') }}" class="btn btn-light">View All</a>
                </div>
            </div>
        </div>
        
        <!-- Teachers Card -->
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Teachers</h5>
                    <p class="card-text">{{ $teachersCount }}</p>
                    <a href="{{ route('superadmin.teachers') }}" class="btn btn-light">View All</a>
                </div>
            </div>
        </div>

        <!-- Staff Card -->
        <!-- <a href="{{ route('superadmin.staff') }}" class="btn btn-light">View All</a> -->
      
        <!-- Students Card -->
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Students</h5>
                    <p class="card-text">{{ $studentsCount }}</p>
                    <a href="{{ route('superadmin.students') }}" class="btn btn-light">View All</a>
                </div>
            </div>
        </div>

        <!-- Drivers Card -->
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Employees</h5>
                    <p class="card-text">{{ $driversCount + $staffCount }}</p>
                    <a href="{{ route('superadmin.drivers') }}" class="btn btn-light">View All</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Calendar -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{__('Events Calendar')}}</strong></h5>
                    <div id="calendar" class="calendar-col-5">
                        @if(count($events) == 0)
                        <p>No event today!</p>
                        @endif
                        @foreach($events as $event)
                        <h3><strong>Date:</strong> <span style="color:green;">{{$event->date}}</span></h3>
                        <h3><strong>Event:</strong> <span style="color:green;">{{$event->event_name}}</span></h3>
                        <a href="/superadmin/read-more/{{$event->id}}" style="color:darkblue; text-decoration:underline;">&#8594; Read More &#8594;</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages/Notifications -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{__('Messages / Notifications')}}</strong></h5>
                    <ul class="list-group"> 
                        <li class="list-group-item"><a href="{{ route('superadmin.view-nofication') }}"><i class="fa fa-eye"></i> View Notifications</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Latest Fees Table -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{__('Latest Fees')}}</strong></h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>


                        @foreach($studentsViewer as $student)
                            <tr>
                                <td>{{$student->firstname}}</td>
                                <td>100000</td>
                                <td>{{$student->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
