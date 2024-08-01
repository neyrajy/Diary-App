@extends('layouts.app')
@section('content')
<div class="row py-3"></div>
<div class="row mt-4">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">My Children</h6>
            
        </div>

        <div class="card-body">
            <table class="table datatable-button-html5-columns">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>ADM_No</th>
                    <th>Section</th>
                    <th>Fees</th>
                    <th>Profile</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="" alt="photo"></td>
                        <td>nane</td>
                        <td>admiss</td>
                        <td>class name section</td>
                        <td>test</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-left">
                                        <a href="#" class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                        <a target="_blank" href="" class="dropdown-item"><i class="icon-check"></i> Marksheet</a>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    </div>
    </div>


@endsection
