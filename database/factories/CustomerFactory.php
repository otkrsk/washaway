<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'contact_no' => '0123456789',
        'plate_no' => 'WUA2815',
        'branch_id' => 1
    ];
});
