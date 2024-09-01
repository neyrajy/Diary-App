@extends('layouts.app')

@section('content')
<div class="row py-1">
   
    </div>

    <div class="row mt-0">
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{__('Students Attendance')}} | {{$nowDate}} <span style="margin-top:-20px" class="d-flex justify-content-end"> 
        </div>
    </div>

    <center>
        <table class="table table-responsive table-striped">
            <tr>
                <th>Student Name</th>
                <th>Attendance Status</th>
                <th>Date</th>
            </tr>
            @foreach($attendances as $attendance)
            @if(Auth::guard('web')->user()->id == $attendance->teacher_id)
            <tr>
                <td>{{$attendance->student_name}}</td>
                <td>
                    @if($attendance->present !='')
                    {{__('Present')}}
                    @elseif($attendance->absent !='')
                    {{__('Absent')}}
                    @endif
                </td>
                <td>{{$attendance->created_at}}</td>
            </tr>
            @endif
            @endforeach
        </table>

        @if(count($attendances) == 0)
        <p>No attendance taken today!</p>
        @endif
    </center>

</div>
</div>
@stop
