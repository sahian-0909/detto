<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id('folio');
            $table->integer('id_empleado');
            $table->integer('id_cliente');
            $table->integer('id_autorizacion')->nullable()->default(0);
            $table->boolean('autorizado')->nullable()->default(False);
            $table->String('tipo');
            $table->Float('subtotal');            
            $table->Float('descuento')->nullable()->default(0);
            $table->Float('impuestos');
            $table->Double('total')->nullable()->default(0);
            $table->Double('anticipo')->nullable()->default(0);
            $table->Double('resto')->nullable()->default(0);
            $table->Double('ganancias')->nullable()->default(0);
            $table->date('fecha_realizacion');
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
        Schema::dropIfExists('cotizacions');
    }
}
