<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Efector::class, function (Faker $faker) {
    return [
      'usuario' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'password' => bcrypt('1234'), // secret
    ];
});
