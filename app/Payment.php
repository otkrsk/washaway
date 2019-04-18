<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'sale_id',
        'total',
        'receipt_no',
        'paid_time',
        'payment_method',
        'status'
    ];

    // public function paymentType()
    // {
    //     return $this->hasOne(PaymentType::class, 'payment_method');
    // }
}
