<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Eorders;
use App\User;
use Faker\Generator as Faker;

$factory->define(Eorders::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'name' => $faker->sentence,
        'discription' => $faker->paragraph,
    ];
});
