<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralMenu extends Model
{
    protected $fillable = [
        'name'
    ];

    public function menuitems()
    {
        return $this->hasMany(GeneralMenuItem::class);
    }

}
