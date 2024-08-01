<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SClass extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];

    public function section()
    {
        return $this->hasMany(Section::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
