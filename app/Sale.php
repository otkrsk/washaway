<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id',
        'customer_id',
        'status'
    ];

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'sales', 'customer_id', 'id');
    }

    public function menuitems()
    {
        // return $this->belongsToMany(MenuItem::class, 'menu_item_sale', 'menu_item_id', 'sale_id');
        return $this->belongsToMany(MenuItem::class);
    }

}
