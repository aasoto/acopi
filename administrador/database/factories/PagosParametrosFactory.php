<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PagosParametrosModel;
use Faker\Generator as Faker;

$factory->define(PagosParametrosModel::class, function (Faker $faker) {
    return [
        'valor_cuota' => '80000',
        'periodo_activo' => '3'
    ];
});
