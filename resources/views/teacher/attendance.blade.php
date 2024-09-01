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
        <form action="/attendances" method="POST" class="attendance-marker">
            @csrf
            <table class="table table-responsive table-striped">
                <tr>
                    <th>Student Name</th>
                    <th>Present</th>
                    <th>Absent</th>
                </tr>
                @foreach($students as $student)
                @if(Auth::guard('web')->user()->class_name == $student->s_class_id)
                <tr>
                    <td>{{$student->firstname}} {{$student->lastname}}</td>
                    <td>
                    <input type="hidden" name="teacher_id[]" id="" value="{{Auth::guard('web')->user()->id}}">
                    <input type="hidden" name="student_name[]" id="" value="{{$student->firstname}}">
                    <input type="checkbox" name="present[]" id="" value="1">
                    </td>
                    <td>
                        <input type="checkbox" name="absent[]" id="" value="0">
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
            <button type="button" class="view-attend-eye" style="background-color:#444;"><a href="/teacher/viw-attendance">View Attendance</a></button>
            <button type="submit" class="submit-attend-marker" style="background-color:orange;">Submit Attendance</button>
        </form>
    </center>

</div>
</div>
@stop
