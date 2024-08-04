@extends('layouts.app')
@section('content')
<div class="row py-3"></div>
<div class="row mt-4">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">My Child Activity | {{$user->firstname}} | Today <span class="currentDate"></span></h6>
            
        </div>

        <div class="card-body">
            <div class="table datatable-button-html5-columns">
                @if(count($activities) == 0)
                
                <center><p>No activity for {{$user->firstname}} today!</p></center>
               
                @endif

                @foreach($activities as $activity)
                @if($activity->adm_no == $user->adm_no)
                <ul>
                    <li>
                    @if($activity->poop_susu != '')
                            <p>Poop: <span>{{ $activity->poop_susu }}</span>,</p>
                            <p>Poop Description: <span>{{ $activity->describe_poop_susu }}</span></p><br>
                        @endif
                        @if($activity->nap != '')
                            <p>Nap: <span>{{ $activity->nap }}</span></p>
                            <p>Nap Description: <span>{{ $activity->describe_nap }}</span></p><br>
                        @endif
                        @if($activity->meals != '')
                            <p>Meals: <span>{{ $activity->meals }}</span></p>
                            <p>Meals: Description: <span>{{ $activity->describe_meals }}</span></p><br>
                        @endif
                        @if($activity->dieppers != '')
                            <p>Dieppers: <span>{{ $activity->dieppers }}</span></p>
                            <p>Dieppers Description: <span>{{ $activity->describe_dieppers }}</span></p><br>
                        @endif
                        @if($activity->milk_bottle_feed != '')
                            <p>Bottle Fedd: <span>{{ $activity->milk_bottle_feed }}</span></p>
                            <p>Bottle Feed Description: <span>{{ $activity->describe_bootle_feed }}</span></p><br>
                        @endif
                    </li>
                </ul>
                @endif
                @endforeach
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
