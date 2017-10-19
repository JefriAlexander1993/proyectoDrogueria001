<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaActual');
            $table->integer('numFactura');
            $table->string('usuario');
            $table->integer('codigo');
            $table->string('nombreProducto');
            $table->integer('cantidad');  
            $table->integer('precioUnitario');  
            $table->integer('stock');
            $table->double('iva');
            $table->double('subTotal');
            $table->double('total');  
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
        Schema::dropIfExists('ventas');
    }
}
