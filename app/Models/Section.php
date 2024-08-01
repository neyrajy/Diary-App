<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
//use Eloquent;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['name', 's_class_id', 'teacher_id'];

    public function s_class()
    {
        return $this->belongsTo(SClass::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
