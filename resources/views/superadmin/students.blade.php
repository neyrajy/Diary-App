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
                            <br><button> <a href="{{ route('students.create') }}" class="btn btn-kprimary">Add Student</a></button>
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
                                            <td>{{ $classes->find($student->s_class_id)->name ?? 'N/A' }}</td>
                                            <td>{{ $sections->find($student->section_id)->name ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-kprimary btn-sm">Edit</a>
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
                            <br><button class="btn btn-kprimary mb-3" data-toggle="modal" data-target="#addClassModal">Add Class</button>
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
                            <br><button class="btn btn-kprimary mb-3" data-toggle="modal" data-target="#addSectionModal">Add Section</button>
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th>Class Name</th>
                                        <th>Section Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sections as $section)
                                        <tr>
                                            <td>{{ $section->s_class->name }}</td>
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




<script>
    function showAddStudentForm(){
        document.querySelector('.modal-dialog').style.display='block';
    }
</script>

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
                                            <label for="s_class_id">Class</label>
                                            <select id="s_class_id" class="form-control" name="s_class_id" required>
                                                <option value="">Select Class</option>
                                                @foreach($classes as $class)
                                                    <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="teacher_id">Teacher (optional)</label>
                                            <select name="teacher_id" class="form-control">
                                                <option value="">None</option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}">{{ $teacher->firstname }} {{ $teacher->lastname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="section_name">Section Name</label>
                                            <input type="text" class="form-control" id="section_name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-kprimary">Add Section</button>
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
