<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'session', 'user_id', 's_class_id', 'section_id', 'my_parent_id', 'adm_no', 'year_admitted', 'grad', 'grad_date', 'age'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function my_parent()
    {
        return $this->belongsTo(User::class);
    }

    public function s_class()
    {
        return $this->belongsTo(SClass::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

}
