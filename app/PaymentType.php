<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    // public function payments()
    // {
    //     return $this->belongsTo(Payment::class, 'payment_method');
    // }


}
