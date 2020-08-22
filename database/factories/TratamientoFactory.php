<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Tratamiento;
use Faker\Generator as Faker;
use App\Planta;


$factory->define(Tratamiento::class, function (Faker $faker) {
    return [
        'fecha' => $faker->word,
        'descripcion' => $faker->text,
        //planta HasMany Planta id
    ];
});
