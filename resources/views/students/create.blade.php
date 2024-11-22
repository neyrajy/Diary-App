@extends('layouts.app')

@section('content')

<x-success_registration />

<div class="card-header">{{ __('Register Student') }}</div>

    <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" class="form-control" required>
                @error('firstname')
                <span id="error-code">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="secondname">Second Name</label>
                <input type="text" name="secondname" class="form-control">
                @error('secondname')
                <span id="error-code">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" class="form-control" required>
                @error('lastname')
                <span id="error-code">{{ $message }}</span>
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
            @error('adm_no')
            <span id="error-code">{{ $message }}</span>
            @enderror
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="age">Date of Birth</label>
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
        </div><br>
        <hr><br><h2>Authorized Persons to Take Your Child</h2><br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="guardian_1">Guardian 1</label>
                <input type="text" name="guardian_1" class="form-control">
                </div>
                @error('guardian_1')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="guardian_2">Guardian 2</label>
                    <input type="text" name="guardian_2" class="form-control">
                </div>
                @error('guardian_2')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
        <div class="col-md-6">
                <div class="form-group">
                <label class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="disability" class="form-label">Disability</label>
                <select class="form-select" id="disability" name="disability">
                    <option value="">Select Disability (if any)</option>
                    <option value="visual_impairment" {{ old('disability') == 'visual_impairment' ? 'selected' : '' }}>Visual Impairment</option>
                    <option value="hearing_impairment" {{ old('disability') == 'hearing_impairment' ? 'selected' : '' }}>Hearing Impairment</option>
                    <option value="cerebral_palsy" {{ old('disability') == 'cerebral_palsy' ? 'selected' : '' }}>Cerebral Palsy</option>
                    <option value="autism_spectrum" {{ old('disability') == 'autism_spectrum' ? 'selected' : '' }}>Autism Spectrum Disorder</option>
                    <option value="learning_disability" {{ old('disability') == 'learning_disability' ? 'selected' : '' }}>Learning Disability</option>
                    <option value="down_syndrome" {{ old('disability') == 'down_syndrome' ? 'selected' : '' }}>Down Syndrome</option>
                    <option value="physical_disability" {{ old('disability') == 'physical_disability' ? 'selected' : '' }}>Physical Disability</option>
                    <option value="other" {{ old('disability') == 'other' ? 'selected' : '' }}>Other (please specify)</option>
                </select>
                @error('disability')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>
        <div class="row">            
            <div class="col-md-12">
                <div class="form-group">
                <label for="special_care_diet" class="form-label">Special Care or Diet Requirements</label>
                <textarea class="form-control" id="special_care_diet" name="special_care_diet" rows="4">{{ old('special_care_diet') }}</textarea>
                @error('special_care_diet')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>

        <button type="submit" style="background-color:#f1d016;" class="btn btn-kprimary">{{ __('Register') }}</button>
    </form>

@endsection