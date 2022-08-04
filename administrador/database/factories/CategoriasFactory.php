<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoriasModel;
use Faker\Generator as Faker;

$factory->define(CategoriasModel::class, function (Faker $faker) {
    return [
        "nombre_categoria" => $faker->randomElement(['Noticias','Capacitación','Eventos','Otros']),
    ];
});
