<?php

namespace App\Models;
use App\Models\BloodGroups;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('firstname','like','%' . request('search') . '%');
        }
    }
    
    protected $fillable = [
        'firstname', 'secondname', 'lastname', 'session', 'photo', 's_class_id', 'section_id', 'adm_no', 'admission_date', 'grad', 'grad_date', 'age', 'bg_id'
    ];

    public function my_parent()
    {
        return $this->belongsTo(User::class, 'my_parent_id');
    }

    public function s_class()
    {
        return $this->belongsTo(SClass::class, 's_class_id');
    }


    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'student_id');
    }

    public function blood_group()
    {
        return $this->belongsTo(BloodGroups::class, 'bg_id');
    }
    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public static function find($id){
        $students = self::all();

        foreach($students as $student){
            if($student['id'] == $id){
                return $student;
            }
        }
    }
}
    