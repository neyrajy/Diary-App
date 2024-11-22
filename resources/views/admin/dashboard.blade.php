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
                    <a href="{{ route('admin.parents') }}" class="btn btn-light">View All</a>
                </div>
            </div>
        </div>
        
        <!-- Teachers Card -->
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Teachers</h5>
                    <p class="card-text">{{ $teachersCount }}</p>
                    <a href="{{ route('admin.teachers') }}" class="btn btn-light">View All</a>
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
                    <a href="{{ route('admin.students') }}" class="btn btn-light">View All</a>
                </div>
            </div>
        </div>

        <!-- Drivers Card -->
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Employees</h5>
                    <p class="card-text">{{ $driversCount + $staffCount }}</p>
                    <a href="{{ route('admin.drivers') }}" class="btn btn-light">View All</a>
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
                        <a href="/admin/read-more/{{$event->id}}" style="color:darkblue; text-decoration:underline;">&#8594; Read More &#8594;</a>
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
                        <li class="list-group-item"><a href="{{ route('admin.view-nofication') }}"><i class="fa fa-eye"></i> View Notifications</a></li>
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
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Fee Type</th>
                                <th>Paid Amount</th>
                                <th>Status</th>
                                <th>Fee Period</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestFees as $fee)
                                <tr>
                                    <td>{{ $fee->id }}</td>
                                    <td>{{ $fee->student->firstname }} {{ $fee->student->secondname }} {{ $fee->student->lastname }}</td>
                                    <td>{{ $fee->feeType->name }}</td>
                                    <td>{{ number_format($fee->paid_amount, 2) }}</td>
                                    <td>{{ $fee->status }}</td>
                                    <td>
                                        @if ($fee->feeType->annual_fee && $fee->paid_amount == $fee->feeType->annual_fee)
                                            Annual
                                        @elseif ($fee->feeType->term_fee_1 && $fee->paid_amount == $fee->feeType->term_fee_1)
                                            Term 1
                                        @elseif ($fee->feeType->term_fee_2 && $fee->paid_amount == $fee->feeType->term_fee_2)
                                            Term 2
                                        @elseif ($fee->feeType->term_fee_3 && $fee->paid_amount == $fee->feeType->term_fee_3)
                                            Term 3
                                        @elseif ($fee->feeType->term_fee_4 && $fee->paid_amount == $fee->feeType->term_fee_4)
                                            Term 4
                                        @else
                                            Unknown
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('admin.fees.edit', $fee->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.fees.destroy', $fee->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
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

