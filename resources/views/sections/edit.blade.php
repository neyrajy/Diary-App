@extends('layouts.app')

@section('content')

<div class="row py-3"></div>

<div class="row mt-4">
    <!-- Sections Table -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Edit Section
                    <span style="margin-top:-20px" class="d-flex justify-content-end">
                    <a href="{{ route('sections.create') }}" class="btn btn-kprimary">Add Section</a></span>
                </h5>
                <form action="{{ route('sections.update', $section->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Section Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $section->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="s_class_id">Class</label>
                        <select name="s_class_id" id="s_class_id" class="form-control" required>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" {{ $section->s_class_id == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="teacher_id">Teacher</label>
                        <select name="teacher_id" id="teacher_id" class="form-control" required>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ $section->teacher_id == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->firstname }} {{ $teacher->lastname }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button  style="background-color:#f1d016;" type="submit" class="btn">Update Section</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
