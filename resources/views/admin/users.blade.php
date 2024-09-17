@extends('layouts.app')

@section('content')
    <div class="row py-3"></div>

    <div class="row mt-4">
        <!-- Parents Table -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        {{__('All Users')}}
                        <span style="margin-top:-20px" class="d-flex justify-content-end">
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.dashboard') }}"><span>&#8592;</span> Back</a>
                        </span>
                    </h5>
                    <table class="table table-responsive table-striped">
                       
                            <tr>
                                <th>S/N</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Role</th>
                                <th>Mobile Phone</th>
                                <th>Address</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                       
                       
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id -1}}</td>
                                <td>
                                    @if($user->firstname !="")
                                    {{$user->firstname}}
                                    @else
                                    @endif
                                </td>
                                <td>
                                    @if($user->lastname !="")
                                    {{$user->lastname}}
                                    @else
                                    @endif
                                </td>
                                <td>
                                    @foreach($roles as $role)
                                    @if($role->id == $user->role_id)
                                    {{$role->role_name}}
                                    @else
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if($user->phone !="")
                                    {{$user->phone}}
                                    @else
                                    @endif
                                </td>
                                <td>
                                    @if($user->address !="")
                                    {{$user->address}}
                                    @else
                                    @endif
                                </td>
                                <td style="text-align:center; color:green; border:none; cursor:pointer;">
                                    <button class="edit-btn" onclick="showEditForm(event, {{$user->id}})"><i class="fa fa-edit"></i></button>
                                    <form action="/users/edit/{{$user->id}}" method="POST" class="edit-form-bt hidden" id="edit-form-bt-{{$user->id}}" enctype="multipart/form-data">
                                        <h1>Edit User Role</h1><br>
                                        @csrf
                                        @method('PUT')
                                        <label for="">Role</label>
                                        <select name="role_id" id="">
                                            <option value="{{$user->role_id}}">--select role --</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                                            @endforeach
                                        </select>
                                        <br><br>
                                        <button type="submit" class="submit-btn">Submit</button>
                                        <button type="button" class="close-form" onclick="closeEditForm(event, {{$user->id}})" style="background-color: maroon;">Close</button>
                                    </form>
                                </td>
                                <td style="text-align:center; color:red; border:none; cursor:pointer;">
                                    <button class="delete-btn" onclick="showDeleteDialog(event, {{$user->id}})"><i class="fas fa-trash-alt"></i></button>
                                    <form action="/users/delete-user/{{$user->id}}" method="POST" class="delete-user-r hidden" id="delete-user-r-{{$user->id}}">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="submit-btn" style="float:left;">Confirm</button>
                                        <button type="button" class="close-form" onclick="closeDeleteDialog(event, {{$user->id}})" style="color: #000;">Close</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <h4>Total Number of User: <b>{{ $usersCounter }}</b></h4> <div class="paginate-builder">{{$users->links()}}</div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function(){
                        window.showEditForm = function(event, userId){
                            event.preventDefault();
                            const formData = document.getElementById(`edit-form-bt-${userId}`);
                            formData.style.display = 'block';
                        }
                        
                        window.closeEditForm = function(event, userId){
                            event.preventDefault();
                            const formData = document.getElementById(`edit-form-bt-${userId}`);
                            formData.style.display = 'none';
                        }

                        window.showDeleteDialog = function(event, myUId){
                            event.preventDefault();
                            const deleteDialg = document.getElementById(`delete-user-r-${myUId}`);
                            deleteDialg.style.display='block';
                        }

                        window.closeDeleteDialog = function(event, myUId){
                            event.preventDefault();
                            const deleteDialg = document.getElementById(`delete-user-r-${myUId}`);
                            deleteDialg.style.display='none';
                        }
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
