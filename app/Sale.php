<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id',
        'customer_id'
    ];

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function menuitems()
    {
        // return $this->belongsToMany(MenuItem::class, 'menu_item_sale', 'menu_item_id', 'sale_id');
        return $this->belongsToMany(MenuItem::class);
    }

}
