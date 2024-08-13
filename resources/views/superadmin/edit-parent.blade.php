@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="row py-3"></div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Parent</div>
                <div class="card-body">
                    <form action="{{ route('superadmin.update-parent', $parent->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Input fields for editing parent information -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="hidden" name="role_id" id="" value="4">
                                    <label for="firstname">First Name</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control" value="{{ $parent->firstname }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="secondname">Second Name</label>
                                    <input type="text" id="secondname" name="secondname" class="form-control" value="{{ $parent->secondname }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control" value="{{ $parent->lastname }}">
                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone 1</label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $parent->phone }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone 2</label>
                                    <input type="text" id="phone2" name="phone2" class="form-control" value="{{ $parent->phone2 }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nal_id">Nationality</label>
                                    <select id="nal_id" name="nal_id" class="form-control">
                                        <option value="">Select Nationality</option>
                                        @foreach($nationalities as $nationality)
                                            <option value="{{ $nationality->id }}" {{ $parent->nal_id == $nationality->id ? 'selected' : '' }}>
                                                {{ $nationality->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="region_id">Region</label>
                                    <select id="region_id" name="region_id" class="form-control">
                                        <option value="">Select Region</option>
                                        @foreach($regions as $region)
                                            <option value="{{ $region->id }}" {{ $parent->region_id == $region->id ? 'selected' : '' }}>
                                                {{ $region->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district_id">District</label>
                                    <select id="district_id" name="district_id" class="form-control">
                                        <option value="">Select District</option>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}" {{ $parent->district_id == $region->id ? 'selected' : '' }}>
                                                {{ $district->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="street">Street Location </label>
                                    <input type="text" id="street" name="street" class="form-control" value="{{ $parent->street }}">
                                </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" class="form-control">{{ $parent->address }}</textarea>
                            </div>
<hr><div><h4>Add Student Details</h4></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="class">{{ __('Select Class') }}</label>
                                    <select id="class" class="form-control @error('class') is-invalid @enderror" name="class" required>
                                        <option value="">Select Class</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}" {{ old('class') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('class')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="section">{{ __('Select Section') }}</label>
                                    <select id="section" class="form-control @error('section') is-invalid @enderror" name="section" required>
                                        <option value="">Select Class Section</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}" {{ old('section') == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('section')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="student">{{ __('Student') }}</label>
                                    <select id="student" class="form-control @error('student') is-invalid @enderror" name="student" required>
                                        
                                        @foreach($students as $student)
                                        <option value="">Select Student</option>    
                                        @endforeach
                                    </select>
                                    @error('student')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                            </div><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Parent</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#class, #section').change(function() {
            var classId = $('#class').val();
            var sectionId = $('#section').val();
            
            if (classId && sectionId) {
                $.ajax({
                    url: '{{ route('get.students') }}',
                    type: 'GET',
                    data: { class_id: classId, section_id: sectionId },
                    success: function(data) {
                        $('#student').empty().append('<option value="">Select Student</option>');
                        $.each(data, function(index, student) {
                            $('#student').append('<option value="' + student.id + '">' + student.firstname + ' ' + student.lastname + '</option>');
                        });
                    }
                });
            } else {
                $('#student').empty().append('<option value="">Select Student</option>');
            }
        });
    });
</script>
@endsection


