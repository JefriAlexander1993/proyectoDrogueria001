<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Producto::class, function (Faker $faker) {

    return [
       
        'codigo' => $faker->numberBetween(1,200),
        'fechaLlegada' =>$faker->date($format = 'Y-m-d', $max = 'now'),
        'nombre' => $faker->realText($maxNbChars = 20),
        'rubio' => $faker->realText($maxNbChars = 20),
        'nombreProveedor'=>$faker->realText($maxNbChars = 20),
        'precioUnitario' => $faker->numberBetween(1,100),
        'cantidad' => $faker->numberBetween(1,100),
        'totalCompra' => $faker->numberBetween(1,100),
        'iva' => $faker->numberBetween(1,100),
        'precioVenta'=> $faker->numberBetween(1,100),
        'fechaVencimiento'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'stock'=> $faker->numberBetween(1,100),


        
    ];
});

$factory->define(App\Caja::class, function (Faker $faker) {

    return [
        
        'nombreUsuario' => $faker->realText($maxNbChars = 20),
        'valorInicial' => $faker->numberBetween(1,100),
        'valorFinal' => $faker->numberBetween(1,100),
        'ganancia' => $faker->numberBetween(1,100),
        
    ];
});

$factory->define(App\Proveedor::class, function (Faker $faker) {

    return [
        
        'nit' => $faker->numberBetween(1,20),
        'nombreProveedor' => $faker->realText($maxNbChars = 20),
        'nombreRepresentante' => $faker->realText($maxNbChars =20),
        'direccion' => $faker->realText($maxNbChars = 20),
        'telefono' => $faker->realText($maxNbChars = 15),
        'email' => $faker->realText($maxNbChars = 20),
        'observacion' => $faker->text(40),   
        
    ];
});

$factory->define(App\Venta::class, function (Faker $faker) {

    return [
    
        'fechaActual' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'numFactura' => $faker->numberBetween(1,30),
        'usuario'=> $faker->realText($maxNbChars = 20),
        'codigo' => $faker->numberBetween(1,30),
        'nombreProducto' => $faker->realText($maxNbChars = 20),
        'cantidad' => $faker->numberBetween(1,30),
        'precioUnitario' => $faker->numberBetween(1,30),
        'stock' => $faker->numberBetween(1,30),
        'iva' => $faker->numberBetween(1,20),
        'subTotal' => $faker->numberBetween(1,20),
        'total' => $faker->numberBetween(1,20),
  

        
    ];
});


