<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Eorders;
use Faker\Generator as Faker;

$factory->define(Eorders::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'discription' => $faker->paragraph,
    ];
});
