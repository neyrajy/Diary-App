@extends('layouts.app')

@section('content')
    <h5 class="card-header"><b>{{ $student->firstname }} {{ $student->secondname }} {{ $student->lastname }}</b> Fee Details  <span style="margin-top:-20px" class="d-flex justify-content-end"> 
        <a class="btn btn-warning btn-sm" href="{{ route('admin.fees.index') }}">Back to Fees</a> </span></h5>
 <h1></h1>
 @foreach($fees as $fee)

 <div class="main-ajax-wrapper" id="main-ajax-wrapper">
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
 </div>

<section>
    <a href="{{ route('admin.fees.receipt', $fee->id) }}" target="_blank">{{ $fee->receipt }}</a>
</section>

<section>
    <a href="{{ route('admin.fees.edit', $fee) }}" class="text-warning">
        <i class="fas fa-edit"></i>
    </a>
</section>

<section>
    <form action="{{ route('admin.fees.destroy', $fee) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Are you sure you want to delete this fee?')">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</section>

@endforeach

@endsection