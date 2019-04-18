<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carbrand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function carModels()
    {
        return $this->hasMany(Carmodel::class, 'carbrand_id', 'id');
    }
}
