@extends('layouts.app')

@section('content')

        <h5 class="card-header">Teachers <span style="margin-top:-20px" class="d-flex justify-content-end"> 
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
                    <th>Tasks</th>
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
                <td>
                    <a href="/admin/teachers-activities/{{$teacher->id}}" class="btn btn-primary btn-sm" style="background-color:green; width: 50px;"><i class="fa fa-eye"></i></a>
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
    
@endsection
