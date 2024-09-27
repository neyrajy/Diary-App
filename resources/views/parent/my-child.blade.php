@extends('layouts.app')
@section('content')
<div class="row py-3"></div>
<div class="row mt-4">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">My Child Activity | {{$student->firstname}} | Today <span class="currentDate"></span></h6>
            
        </div>

        <div class="card-body">
            <div class="table datatable-button-html5-columns">

                @if(count($activities) == 0)
                
                <center><p>No activity for {{$student->firstname}} today!</p></center>
               
                @endif

                @foreach($activities as $activity)
                @if($activity->student_id == $student->id && $activity->created_at->format('Y-m-d') == $nowDate)
                <div class="viewable-class-holderr" id="viewable-holder-{{$activity->id}}">
                @if($activity->mood !='')
                    <p><strong>Mood:</strong> {{$activity->mood}}</p>
                    @endif
                    @if($activity->learning_activities !='')
                    <p><strong>Learning Activities:</strong> {{$activity->learning_activities}}</p>
                    @endif
                    @if($activity->lessons_learnt !='')
                    <p><strong>Learnt Lessons:</strong> {{$activity->lessons_learnt}}</p>
                    @endif
                    @if($activity->needs_more_time !='' && $activity->needs_more_time =='1')
                    <p><strong>{{__('Student Needs More Time')}}</strong>: Yes</p>
                    @elseif($activity->needs_more_time =='0')
                    <p><strong>{{__('Student does not need more time')}}</strong>: No</p>
                    @endif
                    @if($activity->milk_times !='')
                    <p><strong>Milk Time: </strong>{{$activity->milk_times}} Times</p>
                    @endif
                    @if($activity->milk_finished != '' && $activity->milk_finished = '1')
                    <p><strong>Milk Finished:</strong> Yes</p>
                    @endif
                    @if($activity->breakfast !='' && $activity->breakfast == '1')
                    <p><strong>Breakfast:</strong> {{$activity->breakfast}}</p>
                    <p><strong>Breakfast Quantity:</strong> {{$activity->breakfast_quantity}}</p>
                    <p><strong>Breakfast Finished:</strong> Yes</p>
                    @else
                    <p><strong>Breakfast:</strong> {{$activity->breakfast}}</p>
                    <p><strong>Breakfast Quantity:</strong> {{$activity->breakfast_quantity}}</p>
                    <p><strong>Breakfast Finished:</strong> No</p>
                    @endif
                    @if($activity->lunch !='' && $activity->lunch == '1')
                    <p><strong>Lunch:</strong> {{$activity->lunch}}</p>
                    <p><strong>Lunch Quantity:</strong> {{$activity->lunch_quantity}}</p>
                    <p><strong>Lunch Finished:</strong> Yes</p>
                    @else
                    <p><strong>Lunch:</strong> {{$activity->lunch}}</p>
                    <p><strong>Lunch Quantity:</strong> {{$activity->lunch_quantity}}</p>
                    <p><strong>Lunch Finished:</strong> No</p>
                    @endif
                    @if($activity->snack != '' && $activity->snack_finished)
                    <p><strong>Snacks:</strong> {{$activity->snack}}</p>
                    <p><strong>Snack Quantity:</strong> {{$activity->snack_quantity}}</p>
                    <p><strong>Snack Finished:</strong> Yes</p>
                    @else
                    <p><strong>Snacks:</strong> {{$activity->snack}}</p>
                    <p><strong>Snack Quantity:</strong> {{$activity->snack_quantity}}</p>
                    <p><strong>Snack Finished:</strong> No</p>
                    @endif
                    @if($activity->poop !='')
                    <p><strong>Poop:</strong> {{$activity->poop}} Times</p>
                    <p><strong>Description:</strong> {{$activity->describe_poop}}</p>
                    <p><strong>Diepers Used:</strong> {{$activity->diapers_used}} Diepers</p>
                    @endif
                    @if($activity->nap !='')
                    <p><strong>Nap:</strong> {{$activity->nap}} Times</p>
                    @endif
                    @if($activity->milestones !='')
                    <p><strong>Milestones:</strong> {{$activity->milestones}}</p>
                    @endif
                    @if($activity->general_observation !='')
                    <p><strong>General Observation:</strong> {{$activity->general_observation}}</p>
                    @endif
                    <br>
                    <button class="comment-activity">My Comment</button>
                </div>
                @else
                <p>No activity today!</p>
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
