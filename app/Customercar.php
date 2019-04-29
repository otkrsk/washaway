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
        'type',
        'is_subcar'
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

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public static function plate_no_exists($plate_no)
    {
        $plate_no_exists = Customercar::where('plate_no', 'like', '%' . $plate_no . '%')->first();

        if(count($plate_no_exists) > 0)
        {
            return true;
        }

        return false;
    }
}
