<?php

use Faker\Generator as Faker;

$factory->define(App\Customercar::class, function (Faker $faker) {
    return [
        'customer_id' => 1,
        'plate_no' => 'WUA2815',
        'brand' => 1,
        'model' => 1,
        'color' => 1,
        'type' => 1
    ];
});
