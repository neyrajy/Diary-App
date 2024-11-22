@extends('layouts.app')

@section('content')

<h5 class="card-title">
    Add New Section
    <span style="margin-top:-20px" class="d-flex justify-content-end">
    <a href="{{ route('sections.index') }}" class="btn btn-secondary mb-3">Back to Sections</a>
</h5>
<form action="{{ route('sections.store') }}" method="POST">
    @csrf

    <div class="form-group mb-3">
        <label for="name">Section Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="s_class_id">Class</label>
        <select id="s_class_id" class="form-control @error('s_class_id') is-invalid @enderror" name="s_class_id" required>
            <option value="">Select Class</option>
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>
        @error('s_class_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="teacher_id">Teacher (optional)</label>
        <select id="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror" name="teacher_id">
            <option value="">None</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->firstname }} {{ $teacher->lastname }}</option>
            @endforeach
        </select>
        @error('teacher_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-kprimary">Add Section</button>
</form>
@endsection
