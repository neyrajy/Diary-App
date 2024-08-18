<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('student_id','like','%'.request('search').'%')
            ->orwhere('date_time','like','%'.request('search').'%');
        }
    }

    protected $fillable =[
        'student_id','date_time','mood','learning_activities','lessons_learnt','needs_more_time','milk_times','milk_finished','breakfast','breakfast_quantity','breakfast_finished','lunch','lunch_quantity','lunch_finished',
        'snack','snack_quantity','snack_finished','general_observation','poop','describe_poop','nap','diapers_used','photos','videos','milestones',
    ];
}
