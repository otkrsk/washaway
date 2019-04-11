<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralMenuItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id', 'name'
    ];

    public function menu()
    {
        return $this->belongsToMany(GeneralMenu::class);
    }

    public function prices()
    {
        return $this->hasMany(GeneralPrice::class);
    }

}
