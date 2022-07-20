<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GeneroModel;
use Faker\Generator as Faker;

$factory->define(GeneroModel::class, function (Faker $faker) {
    return [
        'codigo_genero' => $faker->randomElement(['F', 'M']),
        'nombre_genero' => $faker->randomElement(['Femenino', 'Masculino'])
    ];
});
