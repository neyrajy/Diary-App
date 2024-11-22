<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount', 'annual_fee', 'term_fee_1', 'term_fee_2', 'term_fee_3', 'term_fee_4'];

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
}
