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
                <div class="card-header">Edit Teacher</div>
                <div class="card-body">
                    <form action="{{ route('superadmin.update-teacher', $teacher->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Input fields for editing teacher information -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control" value="{{ $teacher->firstname }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="secondname">Second Name</label>
                                    <input type="text" id="secondname" name="secondname" class="form-control" value="{{ $teacher->secondname }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control" value="{{ $teacher->lastname }}">
                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone 1</label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $teacher->phone }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone 2</label>
                                    <input type="text" id="phone2" name="phone2" class="form-control" value="{{ $teacher->phone2 }}">
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
                                            <option value="{{ $nationality->id }}" {{ $teacher->nal_id == $nationality->id ? 'selected' : '' }}>
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
                                            <option value="{{ $region->id }}" {{ $teacher->region_id == $region->id ? 'selected' : '' }}>
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
                                            <option value="{{ $district->id }}" {{ $teacher->district_id == $region->id ? 'selected' : '' }}>
                                                {{ $district->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="street">Street Location </label>
                                    <input type="text" id="street" name="street" class="form-control" value="{{ $teacher->street }}">
                                </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" class="form-control">{{ $teacher->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Teacher</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


