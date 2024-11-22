@extends('layouts.app')

@section('content')
    <h5 class="card-header"><b>{{ $fee->student->firstname }} {{ $fee->student->secondname }} {{ $fee->student->lastname }}</b> Fee Details  <span style="margin-top:-20px" class="d-flex justify-content-end"> 
        <a class="btn btn-warning btn-sm" href="{{ route('admin.fees.index') }}">Back to Fees</a> </span></h5>
 <h1></h1>
<p><strong>Name:</strong> {{ $fee->feeType->name }}</p>
<p><strong>Amount:</strong> {{ $fee->paid_amount }}</p>
<p><strong>Remaining Balance:</strong> {{ number_format($fee->feeType->amount - $fee->paid_amount, 2) }}</p>
<p><strong>Term Fee:</strong> 
    @if ($fee->feeType->annual_fee && $fee->paid_amount == $fee->feeType->annual_fee)
        Annual
    @elseif ($fee->feeType->term_fee_1 && $fee->paid_amount == $fee->feeType->term_fee_1)
        Term 1
    @elseif ($fee->feeType->term_fee_2 && $fee->paid_amount == $fee->feeType->term_fee_2)
        Term 2
    @elseif ($fee->feeType->term_fee_3 && $fee->paid_amount == $fee->feeType->term_fee_3)
        Term 3
    @elseif ($fee->feeType->term_fee_4 && $fee->paid_amount == $fee->feeType->term_fee_4)
        Term 4
    @else
        Inompleted for the Term
    @endif</p>
<p><strong>Annual Fee:</strong> {{ $fee->feeType->annual_fee }}</p>
<p><strong>Fee Status:</strong>  {{ ucfirst($fee->status) }}</p>
<p><strong>Paid Date:</strong>  {{ $fee->paid_date }}</p>
<p><strong>Due Date:</strong>  {{ $fee->due_date }}</p>
@endsection