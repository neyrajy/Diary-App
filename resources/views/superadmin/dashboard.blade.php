@extends('layouts.app')

@section('content')
    
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
                    <h5 class="card-title">Events Calendar</h5>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

        <!-- Messages/Notifications -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Messages / Notifications</h5>
                    <ul class="list-group">
                            <li class="list-group-item">messages</li>
                        
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
                    <h5 class="card-title">Latest Fees</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>S/N.</th>
                                <th>Student</th>
                                <th>Amount Paid</th>
                                <th>Balance</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentsViewer as $student)
                                @php
                                    $latestFee = $student->fees()->latest()->first();
                                    $amountPaid = $latestFee ? $latestFee->amount : 0;
                                    $balance = $latestFee ? $latestFee->balance : 0;
                                    $date = $latestFee ? $latestFee->created_at->format('Y-m-d') : 'N/A';
                                @endphp
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                                    <td>{{ $amountPaid }}</td>
                                    <td>{{ $balance }}</td>
                                    <td>{{ $date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</div>

    </div>

<!-- scripts for the calendar -->
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
