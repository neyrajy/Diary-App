@extends('layouts.app')

@section('content')
<div class="row py-3"></div>

<div class="row mt-4">
    <!-- Sections Table -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Edit Class
                    <span style="margin-top:-20px" class="d-flex justify-content-end">
                    <a href="{{ route('classes.create') }}" class="btn btn-kprimary">Add a New Class</a></span>
                </h5>
                <form action="{{ route('classes.update', $class->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Class Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $class->name) }}" required>
                    </div>

                    <button type="submit" class="btn btn-kprimary">Update Class</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
