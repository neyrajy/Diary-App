<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolFeeSetting extends Model
{
    use HasFactory;

    protected $fillable = ['total_annual_fee', 'total_term_fee'];
}
