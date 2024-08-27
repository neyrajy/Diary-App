@extends('layouts.app')

@section('content')

<x-success_registration />

<div class="row py-3"></div>
<div class="row mt-4">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Student') }}</div>

                <div class="card-body">
                <form method="POST" action="/storestudents" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" class="form-control" required>
                            @error('firstname')
                            <br>
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="secondname">Second Name</label>
                            <input type="text" name="secondname" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" class="form-control" required>
                            @error('lastname')
                            <br>
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="s_class_id">Class</label>
                        <select name="s_class_id" class="form-control" required>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="section_id">Section</label>
                        <select name="section_id" class="form-control" required>
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="session">Session</label>
                            <input type="text" name="session" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="admission_date">Admission Date</label>
                            <input type="date" name="admission_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="adm_no">Admission Number</label>
                        <input type="text" name="adm_no" class="form-control">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="date" name="age" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bg_id">Blood Group</label>
                            <select name="bg_id" class="form-control">
                                <option value="">Select Blood Group</option>
                                @foreach($bloodGroups as $bloodGroup)
                                    <option value="{{ $bloodGroup->id }}">{{ $bloodGroup->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="grad_date">Graduation Date</label>
                        <input type="date" name="grad_date" class="form-control">
                    </div>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="grad">Graduated</label>
                        <input type="checkbox" name="grad" value="1">
                    </div>
                    
                    <button type="submit" class="btn btn-kprimary" style="background-color #0000FF;">Register Student</button>
                </form>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection