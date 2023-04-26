<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_almacen', function (Blueprint $table) {
            $table->id('folio');
            $table->integer('id_empleado');
            $table->integer('id_cliente');
            $table->date('dia_salida')->nullable();
            $table->date('dia_entrada')->nullable();
            $table->string('comentarios');
            $table->boolean('entregado')->nullable()->default(0);
            $table->string('tipo');
            $table->boolean('autorizado');
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
        Schema::dropIfExists('almacen');
    }
}
