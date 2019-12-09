<?php

use Illuminate\Database\Seeder;

class MarcaTarjetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('marca_tarjeta')->insert(
        [
        ['nombre' => 'Visa','descripcion' => '','created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')],
        ['nombre' => 'Master Card','descripcion' => '', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')],
        ['nombre' => 'American Express','descripcion' => '', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')],
        ['nombre' => 'Discover Card','descripcion' => '', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')
        ]]);
    }
}
