<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasMany(User::class, 'nal_id');
    }
    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
