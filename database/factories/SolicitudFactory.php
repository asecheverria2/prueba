<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Solicitud;
use Faker\Generator as Faker;
use App\Vivero;
use App\Planta;


$factory->define(Solicitud::class, function (Faker $faker) {
    return [
        'planta_id' => $faker->randomDigit,
        'vivero_id' => $faker->randomDigit,
        'fecha' => $faker->word,
        'direccion' => $faker->text,
        'cantidad' => $faker->text,
        //vivero BelongsTo Vivero vivero_id
        //planta BelongsTo Planta planta_id
    ];
});
