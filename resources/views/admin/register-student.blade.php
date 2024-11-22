@extends('layouts.app')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

@section('content')

<x-student_exists />

<x-success_registration />
<div class="card-header">{{ __('Register Student') }}</div>
    <!-- Add Student Modal -->
<div class="modal-md-5" id="addStudentModal-mod-" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/storestudents" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                </div>
                <div class="modal-body">
                <div class="form-group">
                        <!-- <input type="hidden" name="role_id" value="8" id=""> -->
                        <label for="adm_no">Admission No</label>
                        <input type="text" class="form-control" id="adm_no" name="adm_no" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="role_id" value="8" id="">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date Of birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Gender</label>
                        <select name="gender" id="">
                            <option value="{{old('gender')}}">Choose Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <!-- <input type="date" class="form-control" id="dob" name="dob" required> -->
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Class</label>
                        <select id="class_id" class="form-control" name="class_id" required>
                            <option value="">Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="section_id">Section</label>
                        <select id="section_id" class="form-control" name="section_id" required>
                            <option value="">Select Section</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo">Profile</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="images/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-kprimary">Add Student</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
