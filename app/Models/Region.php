<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
