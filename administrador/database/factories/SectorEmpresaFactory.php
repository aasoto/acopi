<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SectorEmpresaModel;
use Faker\Generator as Faker;

$factory->define(SectorEmpresaModel::class, function (Faker $faker) {
    return [
        "nombre_sector" => $faker->randomElement(['Agroindustrial', 'Prestación de servicios', 'Tecnología', 'Industria Textil'])
    ];
});
