<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberType extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'menu_item_id',
        'name',
        'is_renew',
        'price',
        'length'
    ];

    public function menuitem()
    {
        return $this->belongsToMany(MenuItem::class);
    }

}
