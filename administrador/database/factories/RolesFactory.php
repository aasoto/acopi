<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RolesModel;
use Faker\Generator as Faker;

$factory->define(RolesModel::class, function (Faker $faker) {
    return [
        'rol' => $faker->jobTitle()
    ];
});
