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
        
        'fechaLlegada' =>$faker->date($format = 'Y-m-d', $max = 'now'),
        'nombre' => $faker->realText($maxNbChars = 20),
        'precioCompra' => $faker->numberBetween(1,100),
        'cantidad' => $faker->numberBetween(1,100),
        'iva' => $faker->numberBetween(1,100),
        'precioVenta'=> $faker->numberBetween(1,100),
        'fechaVencimiento'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'nombreProveedor'=>$faker->realText($maxNbChars = 20),
        'stock'=> $faker->numberBetween(1,100),
    ];
});


