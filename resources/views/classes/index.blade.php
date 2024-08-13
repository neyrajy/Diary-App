@extends('layouts.app')

@section('content')
<div class="row py-3"></div>

<div class="row mt-4">
    <!-- Classes Table -->
    <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                    Classes
                    <span style="margin-top:-20px" class="d-flex justify-content-end">
                    <a href="{{ route('classes.create') }}" class="btn btn-kprimary">Add Class</a></span>
                </h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $class)
                        <tr>
                            <td>{{ $class->id }}</td>
                            <td>{{ $class->name }}</td>
                            <td>
                                <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button style="background-color:#dc3545;" type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Total Number of Classes: <b> {{ $classesCount }} </b></h4>
            </div>
        </div>
    </div>

</div>
@endsection
