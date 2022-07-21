<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PagosGeneradosModel;
use Faker\Generator as Faker;

$factory->define(PagosGeneradosModel::class, function (Faker $faker) {
    return [
        'month' => $faker->numberBetween(1, 12),
        'year' => '2022'
    ];
});
