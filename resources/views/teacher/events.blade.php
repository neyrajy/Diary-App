@extends('layouts.app')

@section('content')
<div class="row-modal mt-3">
    <!-- Calendar -->
    <div class="colom-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{__('View Events')}}</h5>
                @if(count($events) == 0)
                <p>No event scheduled yet!</p>
                @endif
                <!-- <h5 class="card-title">Events Calendar</h5> -->
                @foreach($events as $event)
                <div id="calendar" class="calendar-col-6">
                <h1><strong>Date:</strong> <span style="color:green;">{{$event->date}}</span></h1>
                <h1><strong>Event:</strong> <span style="color:green;">{{$event->event_name}}</span></h1>
                <p><strong>Description:</strong> <span style="color:orange;">{{$event->event_description}}</span></p>
                <p><strong>Posted On: {{$event->created_at->format('Y-m-d')}}</strong></p>
                <p><strong>Posted By: {{$event->sender_name}}</strong></p>
                </div><br>
                @endforeach
                <div class="paginate-builder">
                    {{$events->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
