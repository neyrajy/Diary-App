@extends('layouts.app')
@section('content')
<div class="row py-3"></div>
<div class="row mt-4">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">{{__('Notifications')}}</h6>
        </div>

        <div class="card-body">
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

    <script>
    const currentDate = new Date();
    
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const day = String(currentDate.getDate()).padStart(2, '0');
    
    const formattedDate = `${year}-${month}-${day}`;
    
    document.querySelector('.currentDate').textContent = formattedDate;
</script>

    </div>


@endsection
