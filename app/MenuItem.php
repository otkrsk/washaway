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


    // ==================================
    // List of all Relationships
    // ==================================

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

    public function unclaimed()
    {
        return $this->hasMany(Unclaim::class);
    }

    public function membertype()
    {
        return $this->hasMany(MemberType::class);
    }


    // ==================================
    // List of all Functions
    // ==================================

    public static function get_membership_duration(MenuItem $menuitem)
    {
        $duration = '+' . $menuitem->membertype->first()->length . ' year';
        return date('Y-m-d H:i:s',strtotime($duration));
    }

    public static function get_membership_type(MenuItem $menuitem)
    {
        $duration = '+' . $menuitem->membertype->first()->length . ' year';
        return date('Y-m-d H:i:s',strtotime($duration));
    }
}
