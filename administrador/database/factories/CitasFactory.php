<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CitasModel;
use Faker\Generator as Faker;

$factory->define(CitasModel::class, function (Faker $faker) {
    return [
        'tipo_usuario_cita' => $faker->randomElement(['afiliado', 'interesado']),
        'id_empresa' => $faker->randomNumber(3, true),
        'cc_rprt_legal' => $faker->phoneNumber(),
        'cc_interesado' => $faker->phoneNumber(),
        'nombre_interesado' => $faker->firstName($gender = 'male').' '.$faker->firstName($gender = 'male').' '.$faker->lastName().' '.$faker->lastName(),
        'fecha_cita' => $faker->date('Y-m-d'),
        'hora_cita' => $faker->time('H:i:s'),
        'area' => $faker->randomElement(['Director ejecutivo', 'Subdirector administrativo y financiero', 'Subdirector de desarrollo empresarial', 'Subdirector juridico', 'Subdirector de comunicaciones y eventos', 'Asistente de dirección']),
        'estado_cita' => $faker->randomElement(['pendiente', 'atendida', 'perdida', 'cancelada']),
        'color' => '#ffc107'
    ];
});
