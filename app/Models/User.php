<?php

namespace App\Models;

use App\Models\Role;
use App\Models\District;
use App\Models\Nationality;
use App\Models\Region;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('firstname', 'like', '%' . request('search') . '%');
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student2','class_name','section_name','student','firstname', 'secondname', 'lastname', 'email', 'phone', 'phone2', 'dob', 'gender', 'photo', 'address', 'password', 'nal_id', 'region_id', 'district_id', 'street', 'role_id', 'verified', 'verified_at', 'verified_by', 'guardian', 'email_verified_at','salary','employment_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nal_id');
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'my_parent_id');
    }
    public function sections()
    {
        return $this->hasMany(Section::class, 'teacher_id');
    }
}
