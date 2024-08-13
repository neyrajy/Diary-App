@extends('layouts.app')

@section('content')
<div class="row py-3"></div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Edit Student') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $student->firstname }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="secondname">Second Name</label>
                                <input type="text" class="form-control" id="secondname" name="secondname" value="{{ $student->secondname }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $student->lastname }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="s_class_id">Class</label>
                                <select id="s_class_id" class="form-control" name="s_class_id" required>
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ $student->s_class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_id">Section</label>
                                <select id="section_id" class="form-control" name="section_id" required>
                                    <option value="">Select Section</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}" {{ $student->section_id == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="session">Session</label>
                                <input type="text" name="session" value="{{ $student->session }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="admission_date">Admission Date</label>
                                <input type="date" id="admission_date" name="admission_date" value="{{ $student->admission_date }}" class="form-control">
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="adm_no">Admission Number</label>
                                <input type="text" id="adm_no" name="adm_no" value="{{ $student->adm_no }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="date" name="age" id="age" value="{{ $student->age }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bg_id">Blood Group</label>
                                <select id="bg_id" name="bg_id" class="form-control">
                                    <option value="">Select Blood Group</option>
                                    @foreach($bloodGroups as $bloodGroup)
                                        <option value="{{ $bloodGroup->id }}{{ $student->bg_id == $bloodGroup->id ? 'selected' : '' }}">{{ $bloodGroup->name }}</option>
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
                                <input type="date" id="grad_date" name="grad_date" value="{{ $student->grad_date }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="grad">Graduated</label>
                        <input type="checkbox" name="grad" value="1" {{ $student->grad ? 'checked' : '' }}>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Student</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
