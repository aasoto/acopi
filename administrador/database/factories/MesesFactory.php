<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MesesModel;
use Faker\Generator as Faker;

$factory->define(MesesModel::class, function (Faker $faker) {
    return [
        "codigo_mes" => $faker->unique()->numberBetween(1, 12),
        "nombre_mes" => $faker->unique()->randomElement(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']),
        "nombre_mes_min" => $faker->unique()->randomElement(['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'])
    ];
});
