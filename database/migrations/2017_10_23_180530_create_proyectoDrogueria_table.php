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
     $table->string('nombre');
     $table->string('rubro');
     $table->string('marca');
     $table->string('iva')->default(0);
     $table->float('preciounitario');  
     $table->float('precioventa');  
     $table->integer('stockmin');
     $table->timestamps();   

 });



/*--------------------------PROVEEDORES------------------------------------*/

Schema::create('proveedores', function (Blueprint $table) {
    
        $table->increments('id');
        $table->integer('nit')->unique();
        $table->string('nombreproveedor');
        $table->string('nombrerepresentante');
        $table->string('direccion');
        $table->string('telefono');
        $table->string('email');
        $table->text('observacion');
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
        $table->string('nombre');
        $table->string('telefono');
        $table->string('direccion');
        $table->string('correoelectronico',160)->unique();
        $table->string('observacion');
        $table->timestamps();
        

    });

  /*--------------------------CAJAS------------------------------------*/

    Schema::create('cajas', function (Blueprint $table) {
       
        $table->increments('id');
        $table->string('nombreusuario')->unique();
        $table->float('valorinicial');
        $table->float('valorfinal');
        $table->float('ganancia');
        $table->timestamps();

        
    });




   /*--------------------------COMPRAS------------------------------------*/
 
    Schema::create('compras', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->integer('cantidad');
        $table->float('valorunitario');
        $table->float('iva');
        $table->float('valortotal');
        $table->timestamps();
    });



/*--------------------------FACTURACIÓN------------------------------------*/


    Schema::create('facturas', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->increments('id');
        $table->date('fecha');
        $table->timestamps();      
    });
   
    /*--------------------------ARTICULO_FACTURA------------------------------------*/


    Schema::create('detalle_factura', function (Blueprint $table) {
        
        $table->increments('id');
        $table->integer('cantidad');   
        $table->integer('factura_id')->unsigned();       
        $table->integer('articulo_id')->unsigned();
        
        $table->foreign('factura_id')->references('id')->on('facturas')
        ->onUpdate('cascade')->onDelete('cascade');

        $table->foreign('articulo_id')->references('id')->on('articulos')
            ->onUpdate('cascade')->onDelete('cascade');
     
      
        $table->timestamps();
       
/*--------------------------INVENTARIO------------------------------------*/

Schema::create('inventarios', function (Blueprint $table) {
    
            $table->increments('id');
            $table->float('preciodecompra');
            $table->float('preciomedio');
            $table->float('preciodeventa');
            $table->integer('cantidad');
            $table->integer('compras_id')->unsigned();
            $table->foreign('compras_id')->references('id')->on('compras');
            $table->integer('articulos_id')->unsigned();
            $table->foreign('articulos_id')->references('id')->on('articulos');
            $table->timestamps();
    
        });


         /*--------------------------PRODO_FACTURA------------------------------------*/
    });
    
    Schema::create('compra_articulo', function (Blueprint $table) {
        
        $table->increments('id');
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
    $table->string('nombreuser');
    $table->integer('codigo');
    $table->string('nombreproducto');
    $table->integer('cantidad');  
    $table->integer('preciounitario');  
    $table->double('iva');
    $table->double('subtotal');
    $table->double('total');  
    $table->integer('users_id')->unsigned();
    $table->foreign('users_id')->references('id')->on('users');
    $table->integer('cajas_id')->unsigned();
    $table->foreign('cajas_id')->references('id')->on('cajas');
    $table->integer('inventario_id')->unsigned();
    $table->foreign('inventario_id')->references('id')->on('inventarios');
    $table->timestamps();
    
    

 });



/*--------------------------VENTA_ARTICULO------------------------------------*/

 Schema::create('venta_articulo', function (Blueprint $table) {
    
    $table->increments('id');
    
    
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
        Schema::dropIfExists('rubros');
        Schema::dropIfExists('proveedores');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('cajas');
        Schema::dropIfExists('compras');
        Schema::dropIfExists('inventarios');
        Schema::dropIfExists('facturas');
        Schema::dropIfExists('articulo_proveedor');
        Schema::dropIfExists('detalle_factura');
        Schema::dropIfExists('venta_articulo');
        Schema::dropIfExists('compra_articulo');
    }
}
