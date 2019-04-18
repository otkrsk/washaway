<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'contact_no',
        'plate_no',
        'branch_id',
        'is_member'
    ];

    // Relationships
    public function membership()
    {
        return $this->hasOne(Membership::class);
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function cars()
    {
        return $this->hasMany(Customercar::class);
    }

    public function sales()
    {
        // return $this->hasMany(Sale::class);
        return $this->belongsToMany(Sale::class);
    }

    public function unclaimed()
    {
        return $this->hasMany(Unclaimed::class);
    }

    // Functions
    public function member_status(Customer $customer)
    {
        return $this->hasMany(Unclaimed::class);
    }

}
