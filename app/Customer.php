<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'contact_no',
        'plate_no',
        'branch_id'
    ];

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function cars()
    {
        return $this->hasMany(Customercar::class);
    }
}