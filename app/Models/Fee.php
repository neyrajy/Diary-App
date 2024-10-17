<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'type',
        'amount',
        'status',
        'due_date',
        'paid_date',
        'description',
        'receipt',
        'total_fee',
        'paid_amount',
    ];    

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
