<?php

use Faker\Generator as Faker;

$factory->define(App\Price::class, function (Faker $faker) {
    return [
        'menu_item_id' => 1,
        'car_type' => 1,
        'normal_price' => 10,
        'member_price' => 15
    ];
});
