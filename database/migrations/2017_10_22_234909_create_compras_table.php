<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->float('codigo');
            $table->date('fechaLlegada');
            $table->string('nombre');
            $table->string('rubio');
            $table->string('nombreProveedor');
            $table->float('precioUnitario');  
            $table->integer('cantidad');
            $table->integer('totalCompra');
            $table->float('iva');
            $table->float('precioVenta');  
            $table->date('fechaVencimiento');
            $table->integer('stock');
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
        Schema::dropIfExists('compras');
    }
}
