<?php

use Faker\Generator as Faker;

$factory->define(App\MenuItem::class, function (Faker $faker) {
    return [
        'menu_id' => 1,
        'name' => ucfirst($faker->word)
    ];
});
