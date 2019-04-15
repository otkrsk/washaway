<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'name',
        'price',
        'customer_id',
        'membership_type',
        'membership_expires'
    ];

}
