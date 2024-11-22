@extends('layouts.app')

@section('content')
<div class="card-header">{{ __('Edit Student') }}</div>
           
    <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $student->firstname }}">
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
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $student->lastname }}">
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
                    <input type="text" id="session" name="session" value="{{ $student->session }}" class="form-control" required>
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
                    <label for="age">Date of Birth</label>
                    <input type="date" id="ate of Birth" name="age" value="{{ $student->age }}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bg_id">Blood Group</label>
                    <select id="bg_id" name="bg_id" class="form-control">
                        <option value="">Select Blood Group</option>
                        @foreach($bloodGroups as $bloodGroup)
                            <option value="{{ $bloodGroup->id }}" {{ $student->bg_id == $bloodGroup->id ? 'selected' : '' }}>{{ $bloodGroup->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="grad_date">Graduation Date</label>
                    <input type="date" id="grad_date" name="grad_date" value="{{ $student->grad_date }}" class="form-control">
                </div>
            </div>
        </div>
        <br>
        <hr><br><h2>Authorized Persons to Take Your Child</h2><br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="guardian_1">Guardian 1</label>
                <input type="text" name="guardian_1" value="{{ $student->guardian_1 }}"  class="form-control">
                </div>
                @error('guardian_1')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="guardian_2">Guardian 2</label>
                    <input type="text" name="guardian_2" value="{{ $student->guardian_2 }}"  class="form-control">
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
                    <option value="">None</option>
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
                <textarea class="form-control"  value="{{ $student->special_care_diet }}" id="special_care_diet" name="special_care_diet" rows="4">{{ old('special_care_diet') }}</textarea>
                @error('special_care_diet')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="grad">Graduated</label>
            <input type="checkbox" id="grad" name="grad" value="1" {{ $student->grad ? 'checked' : '' }}>
        </div>
        <button type="submit" style="background-color:#f1d016;" class="btn btn-kprimary">{{ __('Update Student') }}</button>
    </form>

@endsection
