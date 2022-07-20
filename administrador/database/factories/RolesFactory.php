<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RolesModel;
use Faker\Generator as Faker;

$factory->define(RolesModel::class, function (Faker $faker) {
    return [
        'rol' => $faker->randomElement(['Director ejecutivo', 'Subdirector administrativo y financiero', 'Subdirector de desarrollo empresarial', 'Subdirector juridico', 'Subdirector de comunicaciones y eventos', 'Asistente de dirección'])
    ];
});
