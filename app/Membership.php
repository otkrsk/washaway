<?php

namespace App;

use App\Sale;
use App\MenuItem;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'customer_id',
        'membership_type',
        'membership_expires',
        'is_expired'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}