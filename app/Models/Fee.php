<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Fee extends Model
{
    use HasFactory;
    
    protected $fillable = ['student_id', 'fee_type_id', 'paid_amount', 'status', 'paid_date', 'due_date', 'receipt'];
    
    protected static function booted()
    {
        static::creating(function ($fee) {
            $fee->receipt = 'RCPT-' . strtoupper(uniqid());
        });
    }
    
    public function getRemainingBalance($paymentType)
    {
        // Check if the payment is for an annual fee or term fee
        if ($paymentType == 'annual') {
            return $this->feeType->annual_fee - $this->paid_amount;
        } else {
            // For term payment (1-4)
            return $this->feeType->{'term_fee_' . $paymentType} - $this->paid_amount;
        }
    }

    public function getStatus($paymentType)
    {
        $remaining_balance = $this->getRemainingBalance($paymentType);

        if ($remaining_balance <= 0) {
            return 'paid';
        } elseif ($remaining_balance < $this->feeType->{'term_fee_' . $paymentType}) {
            return 'partial';
        } else {
            return 'unpaid';
        }
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function feeType()
    {
        return $this->belongsTo(FeeType::class);
    }
}
