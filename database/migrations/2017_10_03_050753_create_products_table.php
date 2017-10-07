<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Producto', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaLlegada');
            $table->string('nombre');
            $table->float('precioCompra');  
            $table->integer('cantidad');
            $table->float('iva');
            $table->float('precioVenta');  
            $table->date('fechaVencimiento');
            $table->string('nombreProveedor');
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
        Schema::dropIfExists('Producto');
    }
}
