@extends('layouts.app')

@section('content')
    <div class="rower-wrapper py-3">
        <div class="col-md-wrapper" id="col-md-3-wrapper">
            <div class="card text-white bg-primary" id="card-texter-wrapper">
                <div class="card-body">
                    <h5 class="card-title">Parents</h5>
                    <p class="card-text">{{ $parentCounter }}</p>
                    <a href="{{ route('superadmin.parents') }}" class="btn btn-light">View All</a>
                </div>
            </div>
            <div class="card-wrapper text-white bg-danger" id="card-wrapper-ajax">
                <div class="card-body">
                    <h5 class="card-title">Students</h5>
                    <p class="card-text">{{ count($students) }}</p>
                    <a href="{{ route('superadmin.students') }}" class="btn btn-light">View All</a>
                </div>
            </div>
            <div class="col-md-ajax">
                <div class="card-body-ajax text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Student Activities</h5>
                        <p class="card-text">{{ count($activities) }}</p>
                        <a href="{{ route('superadmin.drivers') }}" class="btn btn-light">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <br><br><br><br><br><br>
    <form action="/teacher" method="GET" class="wrapper-ajax-search">
        @csrf
        <input type="text" name="search" id="" placeholder="Search a student ...."><button type="submit">Search</button>
    </form><br><br>
    <div class="main-display-viewer">
        <div class="sub-min-viewer">
            <h1 class="specifier-activ">{{ __('Today') }} <span class="currentDate"></span> | {{ __('Students Activities') }}</h1>
            <a href="/activity" class="show-form-activ" style="text-decoration:none;"><i class="fa fa-plus"></i> {{ __('Add Activity') }}</a><br>
        </div>

        <table class="md-data-tabler">
            <tr class="head-tr-mod">
                <th>{{ __('Student Name') }}</th>
                <th>{{ __('Activity') }}</th>
            </tr>
            
            @if(count($student_activities) == 0)
            <p>No activity today</p>
            @endif


            @foreach($student_activities as $activity)
            @if($nowDate == $activity->date_time)
                <tr class="data-tr-mod">
                    <td>
                        @foreach($users as $user)
                            @if($user->id == $activity->student_id)
                                <h1>{{ $user->firstname }}</h1>
                            @endif
                        @endforeach
                    </td>
                    <td>
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
                    </td>
                </tr>
                @endif
            @endforeach
        </table>

        <script>
    const currentDate = new Date();
    
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const day = String(currentDate.getDate()).padStart(2, '0');
    
    const formattedDate = `${year}-${month}-${day}`;
    
    document.querySelector('.currentDate').textContent = formattedDate;
</script>
    </div>
    <center>
        <div class="paginate-builder">
            {{$student_activities->links()}}
        </div>
    </center>
@stop
