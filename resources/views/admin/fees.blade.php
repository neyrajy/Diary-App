@extends('layouts.app')

@section('content')

<x-notification_sent />

<x-status_updated />

<h5 class="card-header"><strong>{{__('Fee Payments Information')}}</strong></h5>
<div id="calendar" class="calendar-col-5">
<table class="table table-striped">
    <tr>
        <th>S/N</th>
        <th>Student Id</th>
        <th>Type</th>
        <th>Amount</th>
        <th>Date Paid</th>
        <th>Description</th>
        <th>Status</th>
        <th>View</th>
        <th>Edit</th>
    </tr>
    @foreach($fees as $fee)
    <tr>
        <td>#</td>
        <td>{{$fee->student_id}}</td>
        <td>{{$fee->type}}</td>
        <td>Tsh {{number_format($fee->amount,2)}}</td>
        <td>{{$fee->paid_date}}</td>
        <td>{{$fee->description}}</td>
        <td>
            @if($fee->status != '')
            <span style="background-color:green;color:#FFF;padding:2px;border-radius:4px;font-size:12px;">{{$fee->status}}</span>
            @else
            @endif
        </td>
        <td style="color:#0000FF; text-align:center; text-decoration:none;">
            <button class="view-receipt" onclick="showReceiptView(event, {{$fee->id}})"><i class="fa fa-eye"></i></button>
            <div class="image-payment-viewer hidden" id="fee-receipt-{{$fee->id}}">
                <h1>{{$fee->type}} Receipt for student {{$fee->student_id}}</h1>
                <button class="closeImage" onclick="closeImageView(event, {{$fee->id}})">&times;</button><br><br>
                <embed src="{{asset('storage/' . $fee->receipt)}}" type="">
                <!-- <img src="{{asset('storage/' . $fee->receipt)}}" alt="Image Receipt"> -->
            </div>
        </td>
        <td style="text-align:center;">
            <button  class="edit-btn-fx" onclick="loadEditForm(event, {{$fee->id}})"><i class="fa fa-edit"></i></button>
            <form action="/fees/edit/{{$fee->id}}" method="POST" class="edit-form-pointer hidden" id="edit-fee-{{$fee->id}}">
                @csrf
                @method('PUT')
                <label for="">Select Status</label><br>
                <select name="status" id="">
                    <option value="">--select status--</option>
                    <option value="paid">Paid</option>
                    <option value="pending">Pending</option>
                </select>
                <br><br>
                <label for="">Description</label><br>
                <input type="text" name="description" id="" value="{{$fee->description}}"><br><br>
                <button type="submit" class="submit-btn-bt">Edit Status</button>
                <button type="button" class="closePopUp" onclick="closePopUp(event, {{$fee->id}})">Close</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            window.showReceiptView = function(event, feeId){
                const feeDialogView = document.getElementById(`fee-receipt-${feeId}`);
                feeDialogView.style.display='block';
            }
            window.closeImageView = function(event,feeId){
                const feeDialogView = document.getElementById(`fee-receipt-${feeId}`);
                feeDialogView.style.display='none';
                // location.reload();
            }
            window.loadEditForm = function(event, loadFeeId){
                const formEdit = document.getElementById(`edit-fee-${loadFeeId}`);
                formEdit.style.display='block';
            }
            window.closePopUp = function(event, loadFeeId){
                const formEdit = document.getElementById(`edit-fee-${loadFeeId}`);
                formEdit.style.display='none';
            }
        });
    </script>

<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            // options here
        });
    });
</script>
@endsection
