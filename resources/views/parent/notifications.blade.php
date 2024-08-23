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
            @foreach($notifications as $notification)
            @if(Auth::guard('web')->user()->role_id == $notification->receiver)
            <div id="calendar" class="calendar-col-7">
            <h1><strong>Title:</strong> {{$notification->title}}</h1>
            @foreach($roles as $role)
            @if($role->id == $notification->receiver)
            <h1><strong>Target:</strong> {{$role->role_name}}</h1>
            @if($nowDate == $notification->created_at->format('Y-m-d'))
            <p><strong>Date Sent:</strong> {{$notification->created_at}} <span style="color:red; font-style:italic;"><i class="fa fa-comments"></i> new notification</span></p>
            @else
            <p><strong>Date Sent:</strong> {{$notification->created_at}} <span style="color:green; font-style:italic;"><i class="fa fa-comments"></i> old notification</span></p>
            @endif
            <p><strong>Body:</strong> {{$notification->description}}</p>
            @endif
            @endforeach
            </div><br>
            @endif
            @endforeach

            <div class="paginate-builder">
                {{$notifications->links()}}
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
