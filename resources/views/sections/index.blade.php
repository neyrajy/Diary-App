@extends('layouts.app')

@section('content')
<div class="row py-3"></div>

<div class="row mt-4">
    <!-- Sections Table -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Sections
                    <span style="margin-top:-20px" class="d-flex justify-content-end">
                    <a href="{{ route('sections.create') }}" class="btn btn-kprimary">Add Section</a></span>
                </h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Section Name</th>
                            <th>Class</th>
                            <th>Teacher</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td>{{ $section->id }}</td>
                                <td>{{ $section->name }}</td>
                                <td>{{ $section->s_class->name }}</td>
                                <td>{{ $section->teacher ? $section->teacher->firstname . ' ' . $section->teacher->lastname : 'N/A' }}</td>
                                <td><a href="{{ route('sections.edit', $section->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
