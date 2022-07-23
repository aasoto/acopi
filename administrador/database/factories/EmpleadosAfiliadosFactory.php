<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmpleadosAfiliadosModel;
use Faker\Generator as Faker;

$factory->define(EmpleadosAfiliadosModel::class, function (Faker $faker) {
    return [
        'tipo_doc_empleado_afiliado' => 'cedula',
        'cc_empleado_afiliado' => $faker->phoneNumber(),
        'primer_nombre' => $faker->firstName($gender = 'male'),
        'segundo_nombre' => $faker->firstName($gender = 'male'),
        'primer_apellido' => $faker->lastName(),
        'segundo_apellido' => $faker->lastName(),
        'cargo_empleado_afiliado' => $faker->randomElement(['Receptacionista', 'Conductor', 'Repartidor', 'Aseador(a)', 'Secretaria']),
        'fecha_nacimiento' => $faker->date('Y-m-d'),
        'id_empresa_afiliado' => $faker->numberBetween(1, 100),
        'nit_empresa_afiliado' => $faker->numberBetween(1, 100),
        'imagen_cedula' => 'vistas/documentos/empresas/empleados/imagen.jpg'
    ];
});
