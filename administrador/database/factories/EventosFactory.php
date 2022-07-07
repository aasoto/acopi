<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EventosModel;
use Faker\Generator as Faker;

$factory->define(EventosModel::class, function (Faker $faker) {

    return [
        'nombre' => $faker->name(),
        'tematica' => $faker->paragraph(),
        'ponentes' => $faker->name(),
        'patrocinadores' => $faker->name(),
        'num_participantes' => $faker->randomNumber(3, false),
        'fecha_inicio' => $faker->date('Y-m-d'),
        'hora_inicio' => $faker->time('H:i:s'),
        'fecha_final' => $faker->date('Y-m-d'),
        'hora_final' => $faker->time('H:i:s'),
        'backgroundColor' => $faker->hexColor(),
        'borderColor' => $faker->hexColor(),
        'allDay' => $faker->boolean()

        /*'tipo_evento' => 'evento',
        'nombre' => $faker->name(),
        'portada_evento' => $faker->image('public/storage/images',640,480, null, false),
        'descripcion' => $faker->paragraph(),
        'palabras_claves' => '[acopi, congreso, microempresarios, agremiacion]',
        'ruta_noticia' => $faker->slug(),
        'contenido_noticia' => $faker->paragraph(),
        'ponentes' => $faker->name(),
        'patrocinadores' => $faker->name(),
        'num_participantes' => $faker->randomNumber(3, false),
        'allDay' => $faker->boolean(),
        'fecha-inicio' => $faker->date('Y-m-d'),
        'hora-inicio' => $faker->time('H:i:s'),
        'fecha-final' => $faker->date('Y-m-d'),
        'hora-final' => $faker->time('H:i:s'),
        'color' => $faker->hexColor()*/

    ];
});

