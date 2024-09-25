@extends('layouts.app')
@section('content')
   
<div class="row-modal mt-3">
        <!-- Calendar -->
        <div class="colom-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Driver Dashboard</h5>
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
                        <a href="/driver/read-more/{{$event->id}}" style="color:darkblue; text-decoration:underline;">&#8594; Read More &#8594;</a>
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
                        <li class="list-group-item"><a href="{{ route('driver.view-nofication') }}"><i class="fa fa-eye"></i> View Notifications</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
        </div>
        <br>
        <div class="card">
                <div class="card-body">
                    <h5 class="card-title">My Assigned Route & Car</h5>
                    <div id="calendar">
                        <table class="table table-responsive table-striped">
                            <tr>
                                <th>Car Name</th>
                                <th>Car Number</th>
                                <th>Route Name</th>
                                <th>Route On Map</th>
                            </tr>
                            @foreach($cars as $car)
                            @if(Auth::guard('web')->user()->id == $car->driverid)
                            <tr>
                                <td>{{$car->carname}}</td>
                                <td>{{$car->carnumber}}</td>
                                <td>
                                    @foreach($routes as $route)
                                    @if($route->id == $car->route)
                                    From {{$route->from}} to {{$route->to}}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($routes as $route)
                                    @if($route->id == $car->route)
                                    <a href="https://www.google.com/maps/dir/?api=1&origin={{$route->from}}&destination={{$route->to}}" target="_blank"><i class="fa fa-eye" style="color:#0000FF;"></i> View</a>
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
    </div>
@stop