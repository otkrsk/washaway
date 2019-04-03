<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customercar extends Model
{
    protected $fillable = [
        'customer_id',
        'plate_no',
        'brand',
        'model',
        'color',
        'type'
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function brand()
    {
        return $this->hasOne(Carbrand::class, 'id', 'brand');
    }

    public function model()
    {
        return $this->hasOne(Carmodel::class, 'id', 'model');
    }

    public function color()
    {
        return $this->hasOne(Carcolor::class, 'id', 'color');
    }
}
