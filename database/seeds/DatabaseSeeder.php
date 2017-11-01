<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ProductosTableSeeder::class);
         $this->call(CompraTableSeeder::class);
         $this->call(ArticulosTableSeeder::class);
         $this->call(ClientesTableSeeder::class);
         $this->call(CajasTableSeeder::class); 
         $this->call(ProveedorTableSeeder::class);
         $this->call(VentaTableSeeder::class);
         

    }
}
