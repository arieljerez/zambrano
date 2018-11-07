<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Paciente::class, function (Faker $faker) {
    $sexo = $faker->randomElement($array = array ('M','F'));
    return [
        'dni' => $faker->unique()->numerify('########'),
        'apellidos' => $faker->lastName,
        'nombres' => $faker->firstName( $sexo == 'M' ? 'male': 'female'),
        'fecha_nacimiento' => $faker->date(),
        'domicilio' => $faker->address,
        'telefono' => $faker->phoneNumber,
        'telefono_familiar' => $faker->phoneNumber,
        'sexo' => $sexo,
    ];
});

