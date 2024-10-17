@extends('layouts.app')

@section('content')
    
<br>

<div class="black-screeen-view"></div>

<div class="row-modal mt-3">
    <!-- Calendar -->
    <div class="colom-md-6">
        <div class="card">
            <div class="card-body">
                <h1>My Activity</h1>
                <button class="button-view" onclick="addTasksForm(event)">Add Activity</button>
            </div>
        </div>
        <table class="table table-responsive table-striped">
            <tr>
                <th>S/N</th>
                <th>Lesson</th> 
                <th>Materials</th>
                <th>Objectives</th>
                <th>Date</th>
            </tr>

            @foreach($tasks as $task)
            <tr class="tr-td">
                <td>{{ $task->id }}</td>
                <td>{{ $task->lesson_title }}</td>
                <td>{{ $task->materials_needed }}</td>
                <td>{{ $task->objectives }}</td>
                <td>{{ $task->created_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <form action="{{ route('add.tasks') }}" method="POST" class="add-activity-post">
        @csrf
        <div class="top-notch-head">
            <h1>Add Your Daily Tasks Here!</h1>
            <button class="closeBtn" onclick="closeBtn(event)" style="background-color: red;" type="button">&times;</button>
        </div>
        <input type="hidden" name="section" id="" value="{{ Auth::guard('web')->user()->section_name }}">
        <input type="hidden" name="class" id="" value="{{ Auth::guard('web')->user()->class_name }}">
        <input type="hidden" name="teacher_id" id="" value="{{ Auth::guard('web')->user()->id }}">
        <label for="">Lesson Title</label><br>
        <input type="text" name="lesson_title" id="" placeholder="Your lesson title here!"><br><br>
        <div class="mid-textarea-inp">
            <div class="inp-textarea01">
                <label for="">Materials Needed</label><br>
                <textarea name="materials_needed" id="" placeholder="Materials Needed!"></textarea>
            </div>
            <div class="inp-textarea02">
                <label for="">Objectives</label><br>
                <textarea name="objectives" id="" placeholder="Objectives Here!"></textarea>
            </div>
        </div>
        <button type="submit" class="sbmt-btn" style="background-color: blue;">Add Activity</button>
    </form>
</div>

<script>
    window.addTasksForm = function(event){
        event.preventDefault();
        const addTaskForm = document.querySelector('.add-activity-post');
        addTaskForm.style.display='block';
    }

    window.closeBtn = function(event){
        event.preventDefault();
        const addTaskForm = document.querySelector('.add-activity-post');
        addTaskForm.style.display='none';
    }
</script>
@stop
