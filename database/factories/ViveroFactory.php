<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Vivero;
use Faker\Generator as Faker;


$factory->define(Vivero::class, function (Faker $faker) {
    return [
        'nombre' => $faker->text,
        'direccion' => $faker->text,
        'email' => $faker->safeEmail,
        'telefono' => $faker->text,
    ];
});
