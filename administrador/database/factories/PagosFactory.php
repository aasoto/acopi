<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PagosModel;
use Faker\Generator as Faker;

$factory->define(PagosModel::class, function (Faker $faker) {
    return [
        /*'id_empresa' => $faker->randomNumber(2, false),
        'valor_deuda' => $faker->randomElement(['80000', '160000', '240000', '0']),
        'valor_mes' => '80000',
        'valor_recibo' => $faker->randomElement(['80000', '160000', '240000', '0']),
        'mes_recibo' => 'julio',
        'fecha_limite' => '2022-07-31',
        'estado' => $faker->randomElement(['no pago', 'pagado', 'vencido', 'negoceado']),
        'id_reporta' => '1'*/
        'id_empresa' => $faker->randomNumber(2, false),
        'valor_deuda' => '0',
        'valor_mes' => '80000',
        'valor_recibo' => '80000',
        'mes_recibo' => 'julio',
        'fecha_limite' => '2022-07-31',
        'estado' => 'no pago',
        'id_reporta' => '1'
    ];
});
