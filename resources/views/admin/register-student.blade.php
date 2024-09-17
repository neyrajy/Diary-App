@extends('layouts.app')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

@section('content')

<x-student_exists />

<x-success_registration />

<div class="row py-3"></div>
<div class="row mt-40">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Register Student') }}</div>
            </div>

                    <!-- Add Student Modal -->
<div class="modal-md-5" id="addStudentModal-mod-" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/storestudents" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                </div>
                <div class="modal-body">
                <div class="form-group">
                        <!-- <input type="hidden" name="role_id" value="8" id=""> -->
                        <label for="adm_no">Admission No</label>
                        <input type="text" class="form-control" id="adm_no" name="adm_no" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="role_id" value="8" id="">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date Of birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Gender</label>
                        <select name="gender" id="">
                            <option value="{{old('gender')}}">Choose Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <!-- <input type="date" class="form-control" id="dob" name="dob" required> -->
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
                    <div class="form-group">
                        <label for="photo">Profile</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="images/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary" style="background-color:#0000FF;">Add Student</button>
                </div>
            </div>
        </form>
    </div>
</div>

        </div>
    </div>
</div>


<!-- <script>
    function showAddStudentForm(){
        document.querySelector('.modal-dialog').style.display='block';
    }
</script> -->

                    <!-- Add Class Modal -->
                    <!-- <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="addClassModalLabel" aria-hidden="true">
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
                    </div> -->

                    <!-- Add Section Modal
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
                    </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
