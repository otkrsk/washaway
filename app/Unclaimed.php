<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unclaimed extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'menu_item_id',
        'quantity',
        'is_unclaimed'
    ];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function menuitems()
    {
        return $this->belongsToMany(MenuItem::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class);
    }

}
