<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmpleadosModel;
use Faker\Generator as Faker;

$factory->define(EmpleadosModel::class, function (Faker $faker) {
    return [
        'tipo_documento' => 'CC',
        'num_documento' => $faker->phoneNumber(),
        'primer_nombre' => $faker->firstName($gender = 'male'),
        'segundo_nombre' => $faker->firstName($gender = 'male'),
        'primer_apellido' => $faker->lastName(),
        'segundo_apellido' => $faker->lastName(),
        'sexo' => $faker->randomElement(['M', 'F']),
        'fecha_nacimiento' => $faker->date('Y-m-d'),
        'email' => $faker->email(),
        'id_rol' => $faker->numberBetween(1, 7),
        'estado' => $faker->randomElement(['Empleado', 'Pasante']),
        'foto' => $faker->image('public/vistas/documentos/empleados/fotos/', 500, 500, null, false),
        'hoja_de_vida' => $faker->image('public/vistas/documentos/empleados/fotos/', 500, 500, null, false),
        'cedula' => $faker->image('public/vistas/documentos/empleados/fotos/', 500, 500, null, false)
    ];
});
