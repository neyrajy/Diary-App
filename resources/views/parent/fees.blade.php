@extends('layouts.app')
@section('content')

<x-success_uploads />

<div class="row py-3"></div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">{{__('Upload Fees Information')}}</h6>
            </div>
        </div>

        <form action="/schoolfees" method="POST" class="card-body" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="student_id">Student</label>
                        <select id="student_id" name="student_id" class="form-control">
                            <option value="">--select student--</option>
                            @foreach($students as $student)
                            @if(Auth::guard('web')->user()->student == $student->id)
                            <option value="{{$student->id}}">{{$student->firstname}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('student_id')
                        <span style="font-size:12px;color:red;font-style:italic;">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="due_date" id="" value="{{$nowDate}}">
                    <input type="hidden" name="paid_date" id="" value="{{$nowDate}}">
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="type">Fee Type</label>
                        <select id="type" name="type" class="form-control">
                            <option value="">--select type--</option>
                            <option value="Tuition Fees">Tuition Fees</option>
                            <option value="Transpot Fees">Transpot Fees</option>
                            <option value="Food Fees">Food Fees</option>
                            <option value="Administrative Cost">Administrative Cost</option>
                        </select>
                        @error('type')
                        <span style="font-size:12px;color:red;font-style:italic;">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" id="amount" name="amount" class="form-control">
                        @error('amount')
                        <span style="font-size:12px;color:red;font-style:italic;">{{$message}}</span>
                        @enderror
                    </div>
                </div>  
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="">
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="receipt">Payment Receipt</label>
                    <input type="file" name="receipt" id="" accept="image/*">
                    @error('receipt')
                    <span style="font-size:12px;color:red;font-style:italic;">{{$message}}</span>
                    @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-submit-mid" style="background-color: #d1b506;">Submit Data</button>
        </form>
    </div>

    <script>
    const currentDate = new Date();
    
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const day = String(currentDate.getDate()).padStart(2, '0');
    
    const formattedDate = `${year}-${month}-${day}`;
    
    document.querySelector('.currentDate').textContent = formattedDate;
</script>

    </div>


@endsection
