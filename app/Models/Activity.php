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
        'student_id','teacher_name','date_time','poop_susu','nap','meals','dieppers','milk_bottle_feed','describe_poop_susu','describe_bootle_feed','describe_nap','describe_meals','describe_dieppers',
    ];
}
