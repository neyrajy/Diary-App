@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h5 class="card-header">
    Admin Profile
    <span style="margin-top:-20px" class="d-flex justify-content-end">
        <a class="btn btn-warning btn-sm" href="{{ route('admin.settings') }}">School Settings</a>
    </span>
</h5>
<form action="{{ route('admin.profile.update') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" class="form-control" value="{{ old('firstname', $admin->firstname) }}" required>
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $admin->lastname) }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $admin->phone) }}" required>
    </div>

    <button type="submit" style="background-color:#07025d;" class="btn btn-primary">Update Profile</button>
</form>

@endsection
