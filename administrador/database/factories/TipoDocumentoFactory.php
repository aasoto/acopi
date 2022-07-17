<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoDocumentoModel;
use Faker\Generator as Faker;

$factory->define(TipoDocumentoModel::class, function (Faker $faker) {
    return [
        'codigo_doc' => 'CC',
        'nombre_doc' => 'Cedula de ciudadania'
    ];
});
