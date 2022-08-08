<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\IndicadoresModel;
use Faker\Generator as Faker;

$factory->define(IndicadoresModel::class, function (Faker $faker) {
    return [
        "empresas_activas" => $faker->numberBetween(80, 100),
        "empresas_inactivas" => $faker->numberBetween(10, 20),
        "empresas_nuevas" => $faker->numberBetween(5, 15),
        "recibos_generados" => $faker->numberBetween(75, 90),
        "recibos_pendientes" => $faker->numberBetween(5, 15),
        "recibos_pagos" => $faker->numberBetween(70, 85),
        "recibos_negociados" => $faker->numberBetween(3, 10)
    ];
});
