@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Student') }}</div>

                <div class="card-body"><form method="POST" action="{{ route('students.store') }}">
    @csrf
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="parent">Parent</label>
        <select name="my_parent_id" class="form-control" required>
            @foreach($parents as $parent)
                <option value="{{ $parent->id }}">{{ $parent->firstname }} {{ $parent->lastname }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="s_class_id">Class</label>
        <select name="s_class_id" class="form-control" required>
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="section_id">Section</label>
        <select name="section_id" class="form-control" required>
            @foreach($sections as $section)
                <option value="{{ $section->id }}">{{ $section->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="session">Session</label>
        <input type="text" name="session" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" class="form-control">
    </div>
    <div class="form-group">
        <label for="year_admitted">Year Admitted</label>
        <input type="text" name="year_admitted" class="form-control">
    </div>
    <div class="form-group">
        <label for="adm_no">Admission Number</label>
        <input type="text" name="adm_no" class="form-control">
    </div>
    <div class="form-group">
        <label for="grad">Graduated</label>
        <input type="checkbox" name="grad" value="1">
    </div>
    <div class="form-group">
        <label for="grad_date">Graduation Date</label>
        <input type="date" name="grad_date" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Register Student</button>
</form>
</div></div></div></div></div>
@endsection