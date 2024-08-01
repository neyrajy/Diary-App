@extends('layouts.app')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

@section('content')
<div class="row py-3"></div>
<div class="row mt-4">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Admin Panel') }}</div>

                    <div class="card-body">
                        
                    <ul class="nav nav-tabs" id="adminTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="students-tab" data-toggle="tab" href="#students" role="tab" aria-controls="students" aria-selected="true">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="classes-tab" data-toggle="tab" href="#classes" role="tab" aria-controls="classes" aria-selected="false">Classes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sections-tab" data-toggle="tab" href="#sections" role="tab" aria-controls="sections" aria-selected="false">Sections</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="adminTabContent">
                        <div class="tab-pane fade show active" id="students" role="tabpanel" aria-labelledby="students-tab">
                            <br><h4>Total Students: {{ $studentsCount }}</h4>
                            <br><button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addStudentModal">Add Student</button>
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->firstname }}</td>
                                            <td>{{ $student->lastname }}</td>
                                            <td>{{ $classes->find($student->class_id)->name ?? 'N/A' }}</td>
                                            <td>{{ $sections->find($student->section_id)->name ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="background-color:#dc3545;" type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="classes" role="tabpanel" aria-labelledby="classes-tab">
                            <h4>Classes</h4>
                            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addClassModal">Add Class</button>
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th>Class Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($classes as $class)
                                        <tr>
                                            <td>{{ $class->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="sections" role="tabpanel" aria-labelledby="sections-tab">
                            <h4>Sections</h4>
                            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSectionModal">Add Section</button>
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th>Section Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sections as $section)
                                        <tr>
                                            <td>{{ $section->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Class</label>
                        <select id="class_id" class="form-control" name="class_id" required>
                            <option value="">Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="section_id">Section</label>
                        <select id="section_id" class="form-control" name="section_id" required>
                            <option value="">Select Section</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </div>
            </div>
        </form>
    </div>
</div>

                    <!-- Add Class Modal -->
                    <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="addClassModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ route('classes.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addClassModalLabel">Add Class</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="class_name">Class Name</label>
                                            <input type="text" class="form-control" id="class_name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Class</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Add Section Modal -->
                    <div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="addSectionModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ route('sections.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addSectionModalLabel">Add Section</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="section_name">Section Name</label>
                                            <input type="text" class="form-control" id="section_name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Section</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
