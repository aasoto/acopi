<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RepresentanteEmpresaModel;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;
$factory->define(RepresentanteEmpresaModel::class, function (Faker $faker) {
    return [
        'tipo_documento_rprt' => 'cedula',
        'cc_rprt_legal' => $faker->randomNumber(3, true),
        'primer_nombre' => $faker->firstName($gender = 'male'),
        'segundo_nombre' => $faker->firstName($gender = 'male'),
        'primer_apellido' => $faker->lastName(),
        'segundo_apellido' => $faker->lastName(),
        'fecha_nacimiento' => $faker->date('Y-m-d'),
        'sexo_rprt' => $faker->randomElement(['m', 'f']),
        'email_rprt' => $faker->email(),
        'telefono_rprt' => $faker->phoneNumber(),
        'foto_rprt' => 'vistas/images/afiliados',
        'foto_cedula_rprt' => 'vistas/images/afiliados'
        /*'foto_rprt' => $faker->image('public/vistas/images/afiliados/fotos', 500, 500, null, false),
        'foto_cedula_rprt' => $faker->image('public/vistas/images/afiliados/documentos', 500, 500, null, false)*/
    ];
});
