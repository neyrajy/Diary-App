@extends('layouts.app')
@section('content')
<div class="row py-3"></div>
<div class="row mt-4">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">{{__('Messages')}}</h6>
        </div>

        <div class="card-body">
            <table>
                <tr class="tr-td-class">
                    <th>#</th>
                    <th>Alert</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                @foreach($messages as $message)
                
                @if(Auth::guard('web')->user()->student == $message->receiver)
                <tr class="tr-td-class">
                    <td>{{__('#')}}</td>
                    <td>{{$message->message_category}}</td>
                    <td>{{$message->message_body}}</td>
                    <td>{{$message->created_at}}</td>
                    <td>
                        @if($nowDate == $message->created_at->format('Y-m-d'))
                        <p class="new-alert">New</p>
                        @else
                        <p class="old-alert" style="">Old</p>
                        @endif
                    </td>
                </tr>
                @endif
               
                @endforeach
                
            </table>
            <div class="paginate-builder">
                {{$messages->links()}}
            </div>
        </div>
    </div>
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
