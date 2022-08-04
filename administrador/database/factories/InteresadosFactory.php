<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InteresadoModel;
use Faker\Generator as Faker;

$factory->define(InteresadoModel::class, function (Faker $faker) {
    return [
        "nombre_interesado" => $faker->firstName($gender = 'male').' '.$faker->lastName(),
        "empresa_interesado" => $faker->company(),
        "email_interesado" => $faker->email(),
        "telefono_interesado" => $faker->phoneNumber(),
        "estado_interesado" => "no contactado"
    ];
});
