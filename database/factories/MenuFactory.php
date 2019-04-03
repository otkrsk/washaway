<?php

use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word),
        'branch_id' => 1
    ];
});
