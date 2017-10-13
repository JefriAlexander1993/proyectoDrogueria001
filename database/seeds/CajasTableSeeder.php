<?php

use Illuminate\Database\Seeder;
use App\Caja;
class CajasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    factory(Caja::class,20)->create();
    }
}
