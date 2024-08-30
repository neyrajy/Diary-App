@extends('layouts.app')

@section('content')

<x-notification_sent />

    <div class="row-modal mt-3">
        <!-- Calendar -->
        <div class="colom-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{__('Fee Payments Information')}}</strong></h5>
                    <div id="calendar" class="calendar-col-5">
                    <table class="table table-striped">
                        <tr>
                            <th>S/N</th>
                            <th>Student Id</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Date Paid</th>
                            <th>Description</th>
                            <th>View</th>
                            <th>Edit</th>
                        </tr>
                        @foreach($fees as $fee)
                        <tr>
                            <td>#</td>
                            <td>{{$fee->student_id}}</td>
                            <td>{{$fee->type}}</td>
                            <td>{{number_format($fee->amount,2)}}</td>
                            <td>{{$fee->paid_date->format('Y-m-d')}}</td>
                            <td>{{$fee->description}}</td>
                            <td style="color:#0000FF; text-align:center; text-decoration:none;"><button class="view-receipt"><i class="fa fa-eye"></i></button></td>
                            <td style="text-align:center;" class="edit-btn"><button><i class="fa fa-edit"></i></button></td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            // options here
        });
    });
</script>
@endsection
