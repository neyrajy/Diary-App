@extends('layouts.app')

@section('content')
    
    <div class="row py-3">
   
    </div>

    <div class="row mt-4">
        <!-- Parents Table -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Teachers <span style="margin-top:-20px" class="d-flex justify-content-end"> 
                    <a class="btn btn-warning btn-sm" href="{{ route('admin.register-teacher') }}">Add Teacher</a> </span></h5>
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Teacher's Name</th>
                                <th>Mobile Phone</th>
                                <th>Address</th>
                                <th>Class</th>
                                <th>Section</th>
                                <!-- <th>Fee Paid (TZS)</th> -->
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->firstname }} {{ $teacher->lastname }}</td>
                            <td>{{ $teacher->phone }}</td>
                            <td>{{ $teacher->address }}</td>
                            <td>
                            @foreach($classes as $class)
                            @if($teacher->class_name == $class->id)
                            {{$class->name}}
                            @endif
                            @endforeach
                            </td>
                            <td>
                            @foreach($sections as $section)
                            @if($teacher->section_name == $section->id)
                            {{$section->name}}
                            @endif
                            @endforeach
                            </td>
                            <!-- <td>{{number_format('100000')}}/=</td> -->
                            <td>
                                <a href="/admin/teachers/edit/{{$teacher->id}}" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                            <td>
                                <form action="/admin/teachers/destroy/{{$teacher->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button style="background-color:#dc3545" type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach   
                        </tbody>
                    </table>
                    <h4>Total Number of Teachers: <b>{{ $teachersCount }}</b></h4>
                </div>
            </div>
        </div>
    </div>
@endsection
