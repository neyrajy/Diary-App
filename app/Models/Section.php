<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
//use Eloquent;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['name', 's_class_id', 'teacher_id'];

    public function s_class()
    {
        return $this->belongsTo(SClass::class, 's_class_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
