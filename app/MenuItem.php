<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id', 'name', 'product_type'
    ];

    public function menu()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class);
    }
}

