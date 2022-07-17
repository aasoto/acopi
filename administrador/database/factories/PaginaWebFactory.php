<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PaginaWebModel;
use Faker\Generator as Faker;

$factory->define(PaginaWebModel::class, function (Faker $faker) {
    return [
        'dominio' => 'https://www.acopicesar.org',
        'servidor' => 'http://localhost/'
    ];
});
