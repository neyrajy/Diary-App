@extends('layouts.app')
@section('content')
<div class="row py-3">
        <!-- Parents Card -->
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Parents</h5>
                    <p class="card-text">{{ $parentsCount }}</p>
                    <a href="{{ route('manager.parents') }}" class="btn btn-light">View All</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Teachers</h5>
                    <p class="card-text">{{ $teachersCount }}</p>
                    <a href="{{ route('manager.teachers') }}" class="btn btn-light">View All</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Students</h5>
                    <p class="card-text">{{ $studentsCount }}</p>
                    <a href="{{ route('manager.students') }}" class="btn btn-light">View All</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Employees</h5>
                    <p class="card-text">{{ $driversCount + $staffCount }}</p>
                    <a href="{{ route('manager.drivers') }}" class="btn btn-light">View All</a>
                </div>
            </div>
        </div>

        <div class="row mt-4" style="margin-left:0%;">
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

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{__('Messages / Notifications')}}</strong></h5>
                    <ul class="list-group"> 
                        <li class="list-group-item"><a href="{{ route('manager.view-nofication') }}"><i class="fa fa-eye"></i> View Notifications</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mt-4" style="margin-left:0%;">
        <!-- Latest Fees Table -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{__('Employees Details')}}</strong></h5>
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Employee Name</th>
                                <th>Role</th>
                                <th>Contract Type</th>
                                <th>Salary</th>
                                <th>Reg Date</th>
                                <!-- <th>Action</th> -->
                            </tr>
                            @foreach($employees as $employee)
                            <tr>
                              <td>{{$employee->id}}</td>
                              <td>{{$employee->firstname}} {{$employee->lastname}}</td>
                              <td>
                                @foreach($roles as $role)
                                @if($role->id == $employee->role_id)
                                {{$role->role_name}}
                                @endif
                                @endforeach
                              </td>
                              <td>{{$employee->employment_type}}</td>
                              <td>Tsh {{number_format($employee->salary,2)}}</td>
                              <td>{{$employee->created_at}}</td>
                              <td>
                                 <a href="#" class="edit-btn-link" onclick="showEditRoute(event, {{$employee->id}})"><i class="fa fa-edit"></i></a>
                                 <a href="#" class="delete-btn-link" onclick="showDeleteForm(event, {{$employee->id}})"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            @endforeach

                            @foreach($staffs as $staff)
                            <tr>
                              <td>{{$staff->id}}</td>
                              <td>{{$staff->firstname}} {{$staff->lastname}}</td>
                              <td>
                                @foreach($roles as $role)
                                @if($role->id == $staff->role_id)
                                {{$role->role_name}}
                                @endif
                                @endforeach
                              </td>
                              <td>{{$staff->employment_type}}</td>
                              <td>Tsh {{number_format($staff->salary,2)}}</td>
                              <td>{{$staff->created_at}}</td>
                              <!-- <td>
                                 <a href="#" class="edit-btn-link" onclick="showEditRoute(event, {{$staff->id}})"><i class="fa fa-edit"></i></a>
                                 <a href="#" class="delete-btn-link" onclick="showDeleteForm(event, {{$staff->id}})"><i class="fa fa-trash"></i></a>
                              </td> -->
                            </tr>
                            @endforeach
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop