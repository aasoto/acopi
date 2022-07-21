<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MunicipiosModel;
use Faker\Generator as Faker;

$factory->define(MunicipiosModel::class, function (Faker $faker) {
    return [
        'abreviatura' => $faker->randomElement(['VLL', 'ZRVLL', 'AGC', 'CDZ', 'AST', 'BCR', 'BSC', 'CHM', 'CHR'])
    ];
});
