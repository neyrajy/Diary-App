<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('class' , 'like' , '%' . request('search') . '%')
            ->orwhere('section' , 'like' , '%' . request('search') . '%');
        }
    }

    protected $fillable = [
        'teacher_id',
        'lesson_title',
        'objectives',
        'materials_needed',
        'class',
        'section',
    ];
}
