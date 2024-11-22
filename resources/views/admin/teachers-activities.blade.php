@extends('layouts.app')

@section('content')
    
<section class="card-header">
    <form action="/admin/teachers-activities/{{$teacher->id}}" method="GET" class="filter-date">
        @csrf
        <div class="input-filter">
            <input type="date" name="fromDate" id="">
            <input type="date" name="toDate" id="">
            <button type="submit" class="filter-btn">Filter</button>
        </div>
    </form>
    <form action="/admin/teachers-activities/{{$teacher->id}}" method="GET" class="filter-name-id">
        @csrf
        <select name="search" id="">
            <option value="" selected disabled>--select--</option>
            <option value="">All</option>
            @foreach($tasks as $task)
            @if($task->teacher_id == $teacher->id)
            @foreach($classes as $class)
            @if($class->id == $task->class)
            <option value="{{ $task->class }}">{{ $class->name }}</option>
            @endif
            @endforeach
            
            @foreach($sections as $section)
            @if($section->id == $task->section)
            <option value="{{ $task->section }}">{{ $section->name }}</option>
            @endif
            @endforeach

            @endif
            @endforeach
        </select>
        <button type="submit" class="filter-btn">Filter</button>
    </form>
    <br>
</section>
<table class="table table-responsive table-striped">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Teacher</th>
            <th>Class</th>
            <th>Section</th>
            <th>Lesson</th>
            <th>Materials</th>
            <th>Objectives</th>
            <th>Date</th>
        </tr>
        @foreach($tasks as $task)
        @if($task->teacher_id == $teacher->id && $todayDate == $task->created_at->format('Y-m-d'))
        <tr  class="tr-td">
            <td>{{$task->id}}</td>
            <td>
                {{ $teacher->firstname }} {{ $teacher->lastname }}
            </td>
            <td>
                @foreach($classes as $class)
                @if($class->id == $task->class)
                {{ $class->name }}
                @endif
                @endforeach
            </td>
            <td>
                @foreach($sections as $section)
                @if($section->id == $task->section)
                {{ $section->name }}
                @endif
                @endforeach
            </td>
            <td>
                {{ $task->lesson_title }}
            </td>
            <td>
                {{ $task->materials_needed }}
            </td>
            <td>
                {{ $task->objectives }}
            </td>
            <td>
                {{ $task->created_at }}
            </td>
        </tr>
        @endif
        @endforeach
    </thead>
    <tbody>
    
    </tbody>
</table>

@endsection
