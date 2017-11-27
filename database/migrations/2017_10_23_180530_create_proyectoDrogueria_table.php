<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoDrogueriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


/*-------------------------ARTICULOS-----------------------------------------*/   
    
     Schema::create('articulos', function (Blueprint $table) {    
     $table->increments('id');
     $table->integer('codigo')->unique();
     $table->date('fechavencimiento');
     $table->string('nombre')->unique();
     $table->string('rubro')->nullable();
     $table->string('marca')->nullable();
     $table->integer('cantidad')->default(0);
     $table->float('iva')->default(0);
     $table->float('preciounitario');  
     $table->float('precioventa');  
     $table->integer('stockmin');
     $table->timestamps();   

 });



/*--------------------------PROVEEDORES------------------------------------*/

Schema::create('proveedores', function (Blueprint $table) {
    
        $table->increments('id');
        $table->integer('nit')->unique();
        $table->string('nombreproveedor')->unique();
        $table->string('nombrerepresentante');
        $table->string('direccion')->nullable();
        $table->string('telefono');
        $table->string('email')->nullable();
        $table->text('observacion')->nullable();
        $table->timestamps();


    });

   
    /*--------------------------ARTICULO_PROVEEDOR------------------------------------*/


    Schema::create('articulo_proveedor', function (Blueprint $table) {
      
        $table->increments('id');
        $table->integer('articulo_id')->unsigned();
        $table->integer('proveedor_id')->unsigned();

        $table->foreign('articulo_id')->references('id')->on('articulos')
            ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('proveedor_id')->references('id')->on('proveedores')
            ->onUpdate('cascade')->onDelete('cascade');

        // $table->primary(['articulo_id', 'proveedor_id']);
       

        $table->timestamps();

    });

/*--------------------------CLIENTES------------------------------------*/

    Schema::create('clientes', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('nuip')->unique();
        $table->string('nombre');
        $table->string('telefono');
        $table->string('direccion')->nullable();
        $table->string('correoelectronico',160)->nullable();
        $table->string('observacion')->nullable();
        $table->timestamps();
        

    });

  /*--------------------------CAJAS------------------------------------*/

    Schema::create('cajas', function (Blueprint $table) {
       
        $table->increments('id');
        $table->string('nombreusuario')->unique();
        $table->float('valorinicial')->default(0);
 
        $table->timestamps();

        
    });

    Schema::create('detalle_caja', function (Blueprint $table) {
        
        $table->increments('id');
        $table->float('valorfinal')->default(0);
        $table->float('ganancia')->default(0);

        $table->integer('caja_id')->unsigned();       
        $table->integer('user_id')->unsigned();
        
         $table->foreign('caja_id')->references('id')->on('cajas')
         ->onUpdate('cascade')->onDelete('cascade');

        $table->foreign('user_id')->references('id')->on('users')
         ->onUpdate('cascade')->onDelete('cascade');
    
         $table->timestamps();

           

    });


   /*--------------------------COMPRAS------------------------------------*/
 
    Schema::create('compras', function (Blueprint $table) {
        $table->increments('id');
        $table->double('totalCompra');
       
        $table->integer('users_id')->unsigned();
        $table->foreign('users_id')->references('id')->on('users');

        $table->timestamps();
    });

         /*--------------------------COMPRA_ARTICULO------------------------------------*/
  
    
    Schema::create('compra_articulo', function (Blueprint $table) {
        
        $table->increments('id');
        $table->integer('cantidad');
        $table->integer('cantotal');
        $table->float('preciounitario');
        $table->float('subtotal');
        $table->float('total');
        $table->integer('compra_id')->unsigned();       
        $table->integer('articulo_id')->unsigned();


         $table->foreign('compra_id')->references('id')->on('compras')
         ->onUpdate('cascade')->onDelete('cascade');

        $table->foreign('articulo_id')->references('id')->on('articulos')
         ->onUpdate('cascade')->onDelete('cascade');
    
         $table->timestamps();

           

    });
    
    
/*--------------------------VENTAS------------------------------------*/
Schema::create('ventas', function (Blueprint $table) {
    
    $table->increments('id');
    $table->double('totalventa');  
    
    $table->integer('users_id')->unsigned();
    $table->foreign('users_id')->references('id')->on('users');
   
    $table->timestamps();
    
    

 });



/*--------------------------VENTA_ARTICULO------------------------------------*/

Schema::create('venta_articulo', function (Blueprint $table) {
    
    $table->increments('id');
    $table->integer('cantidad');
    $table->float('preciounitario');
    $table->float('subtotal');
    $table->float('total');
    $table->integer('venta_id')->unsigned();       
    $table->integer('articulo_id')->unsigned();
     
     $table->foreign('venta_id')->references('id')->on('ventas')
     ->onUpdate('cascade')->onDelete('cascade');

     $table->foreign('articulo_id')->references('id')->on('articulos')
         ->onUpdate('cascade')->onDelete('cascade');
  
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
        Schema::dropIfExists('articulos');   
        Schema::dropIfExists('proveedores');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('cajas');
        Schema::dropIfExists('detalle_caja');
        Schema::dropIfExists('compras'); 
        Schema::dropIfExists('ventas'); 
        Schema::dropIfExists('articulo_proveedor');
        Schema::dropIfExists('venta_articulo');
        Schema::dropIfExists('compra_articulo');
    }
}
