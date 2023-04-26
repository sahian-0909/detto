<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detalleal', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->integer('id_prenda')->nullable()->default(9999);
            $table->string('tip_prenda');
            $table->string('tallas');
            $table->string('producto');
            $table->string('color');
            $table->string('codigo');
            $table->boolean('devolucion');
            $table->text('comentarios');
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
        Schema::dropIfExists('detalleal');
    }
}
