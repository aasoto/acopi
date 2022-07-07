<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EntrevistasModel;
use Faker\Generator as Faker;

$factory->define(EntrevistasModel::class, function (Faker $faker) {
    return [
        //'id' => $faker->unique()->randomDigit(),
        'titulo_entrevista'        => $faker->sentence(),
        'descripcion_entrevista'   => $faker->paragraph(),
        'video_entrevista'          => 'https://www.youtube.com/watch?v=_GwqxAi_ly0'
    ];
});
