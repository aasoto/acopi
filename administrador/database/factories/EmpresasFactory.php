<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmpresasModel;
use Faker\Generator as Faker;
use Faker\Provider\en_US\Company;

$factory->define(EmpresasModel::class, function (Faker $faker) {
    return [
        'nit_empresa' => $faker->phoneNumber(),
        'razon_social' => $faker->company(),
        'cc_rprt_legal' => $faker->randomNumber(7, true),
        'num_empleados' => $faker->randomNumber(2, true),
        'direccion_empresa' => $faker->streetAddress(),
        'telefono_empresa' => $faker->randomNumber(7, true),
        'fax_empresa' => $faker->randomNumber(7, true),
        'celular_empresa' => $faker->randomNumber(7, true),
        'email_empresa' => $faker->email(),
        'id_sector_empresa' => $faker->randomNumber(1, true),
        'productos_empresa' => $faker->word(),
        'ciudad_empresa' => $faker->city(),
        'estado_afiliacion_empresa' => $faker->randomElement(['nueva', 'activa', 'inactiva']),
        'numero_pagos_atrasados' => $faker->randomNumber(1, true),
        'fecha_afiliacion_empresa' =>$faker->date('Y-m-d'),
        'carta_bienvenida' => 'vistas/documentos/carta_bienvenida',
        'acta_compromiso' => 'vistas/documentos/acta_compromiso',
        'estudio_afiliacion' => 'vistas/documentos/estudio_afiliacion',
        'rut' => 'vistas/documentos/rut',
        'camara_comercio' => 'vistas/documentos/camara_comercio',
        'fechas_birthday' => 'vistas/documentos/fechas_birthday'
    ];
});
