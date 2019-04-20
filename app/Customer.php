<?php

namespace App;

use App\Sale;

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

    // ==================================
    // List of all Relationships
    // ==================================

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

    // ==================================
    // List of all Functions
    // ==================================

    public function member_status(Customer $customer)
    {
        return $this->hasMany(Unclaimed::class);
    }

    public static function hasSale(Customer $customer, $authUser)
    {
        $sale = Sale::where('user_id',$authUser->branches()->first()->id)
            ->where('customer_id',$customer->id)
            ->where('status',0)
            ->where('is_cancel',false)
            ->get();

        
        if(count($sale) > 0)
        {
            $response = [
                'status' => true,
                'sale' => $sale
            ];
        }
        else
        {
            $response = [
                'status' => false
            ];
        }

        return $response;
    }

}
