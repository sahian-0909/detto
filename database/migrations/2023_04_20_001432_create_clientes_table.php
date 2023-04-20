<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('nombre_compania');
            $table->string('razon_social');
            $table->string('nombre_contacto');
            $table->string('puesto_contacto');
            $table->string('correo_compania');
            $table->string('correo_contacto');
            $table->string('telefono_compania');
            $table->string('telefono_contacto');
            $table->text('domicilio_compania');
            $table->boolean('activo')->nulleable()->default(TRUE);
            $table->string('fotoCliente')->default('clientesDetto.jpg')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
