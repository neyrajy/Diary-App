@extends('layouts.app')

@section('content')
<div class="row-modal mt-3">
    <x-message_stored />
    <!-- Calendar -->
    <div class="colom-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{__('View Messages')}}</h5>
                
            </div>
        </div>
    </div>
</div>
@stop
