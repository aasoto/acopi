<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id_empresa');
            $table->text('nit_empresa');
            $table->text('razon_social');
            $table->text('cc_rprt_legal');
            $table->integer('num_empleados');
            $table->text('direccion_empresa');
            $table->text('telefono_empresa');
            $table->text('fax_empresa');
            $table->text('celular_empresa');
            $table->text('email_empresa');
            $table->integer('id_sector_empresa');
            $table->text('productos_empresa');
            $table->text('ciudad_empresa');
            $table->text('estado_afiliacion_empresa');
            $table->integer('numero_pagos_atrasados');
            $table->date('fecha_afiliacion_empresa');
            $table->text('carta_bienvenida');
            $table->text('acta_compromiso');
            $table->text('estudio_afiliacion');
            $table->text('rut');
            $table->text('camara_comercio');
            $table->text('fechas_birthday');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
