@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1>{{ __('Add Student Activity') }}</h1> 
                    <form action="/teacher/activity" method="GET" class="search-wrapp">
                        <input type="text" name="search" id="" placeholder="Enter student name . . .">
                        <button type="submit" class="submit-act-btn"><i class="fa fa-search"></i> <span>Search</span></button>
                    </form>
                    </div>

                    <!-- @if($studentExistsConuter == 0)
                    <br>
                    <center><p>Students do not exist...</p></center>
                    @endif -->
                    
                    <center>
                    <div class="card-body">
                        <table class="scrollable-tabler">
                            <tr class="head-tr">
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <!-- <th>Gender</th> -->
                                <!-- <th>Status</th> -->
                                <th>Action</th>
                            </tr>
                            @foreach($students as $student)
                                
                                    <tr class="main-tr-wrapper">
                                        <td>{{$student->firstname}}</td>
                                        <td>
                                            @foreach($s_classes as $class)
                                            @if($student->s_class_id == $class->id)
                                            {{$class->name}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                        @foreach($sections as $section)
                                            @if($student->section_id == $section->id)
                                            {{$section->name}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <!-- <td>{{$student->gender}}</td> -->
                                        <!-- <td>No activity</td> -->
                                        <td style="text-align:center;"><a href="/add-activity/{{$student->id}}"><i class="fa fa-plus"></i> Add Activity</a></td>
                                    </tr>
                               
                            @endforeach
                        </table>                   
                        <!-- <form method="POST" action="{{ route('superadmin.store-parent') }}" enctype="multipart/form-data">

                        </form> -->
                    </div>
                    </center> 
                </div>
            </div>
        </div>
    </div>
@stop