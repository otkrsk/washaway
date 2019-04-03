<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carmodel extends Model
{
    protected $fillable = [
        'name', 'type', 'carbrand_id'
    ];

    public function carType()
    {
        return $this->hasOne(Cartype::class, 'id', 'type');
    }
}
