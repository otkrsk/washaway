<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_item_id', 'car_type', 'normal_price', 'member_price'
    ];

    public function menuitems()
    {
        return $this->belongsToMany(MenuItem::class);
    }

    public function car_types()
    {
        return $this->hasOne(Cartype::class, 'id', 'car_type');
    }

}

