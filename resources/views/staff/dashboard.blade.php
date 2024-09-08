@extends('layouts.app')
@section('content')
<div class="row-modal mt-3">
        <!-- Calendar -->
        <div class="colom-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Staff Dashboard</h5>
                    <div id="calendar"></div>
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
                        <a href="/staff/read-more/{{$event->id}}" style="color:darkblue; text-decoration:underline;">&#8594; Read More &#8594;</a>
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
                        <li class="list-group-item"><a href="{{ route('staff.view-nofication') }}"><i class="fa fa-eye"></i> View Notifications</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

@stop