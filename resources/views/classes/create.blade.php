@extends('layouts.app')

@section('content')
<div class="row py-3"></div>

<div class="row mt-4">
    <!-- Classes Table -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Add a New Class
                    <span style="margin-top:-20px" class="d-flex justify-content-end">
                    <a href="{{ route('classes.index') }}" class="btn btn-secondary mb-3">Back to Classes</a>
                </h5>
                <form action="{{ route('classes.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Class Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-kprimary">Create Class</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
