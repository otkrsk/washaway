<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'branch_id'
    ];

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function menuitems()
    {
        return $this->hasMany(MenuItem::class);
    }

}
