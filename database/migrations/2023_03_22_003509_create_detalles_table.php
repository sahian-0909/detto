<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->integer('id_prenda');
            $table->text('comentariosPrenda')->default('');
            $table->float('cantidad');
            $table->float('costo_unitario')->default('00.00');
            $table->float('importe')->default('00.00');
            $table->float('descuento')->default('00.00');
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
        Schema::dropIfExists('detalles');
    }
}
