<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Planta;
use Faker\Generator as Faker;
use App\Solicitud;
use App\Tratamiento;


$factory->define(Planta::class, function (Faker $faker) {
    return [
        'tratamiento_id' => $faker->randomDigit,
        'nombrecomun' => $faker->text,
        'nombrecientifico' => $faker->text,
        'familia' => $faker->text,
        'fechaingreso' => $faker->dateTime(),
        'descripcion' => $faker->text,
        'cantidad' => $faker->text,
        //solicitud HasMany Solicitud id
        //tratamiento BelongsTo Tratamiento tratamiento_id
    ];
});
