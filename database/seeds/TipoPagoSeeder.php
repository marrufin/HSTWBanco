<?php

use Illuminate\Database\Seeder;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_pago')->insert(
        [
            ['nombre' => 'Anual','descripcion' => 'prestamo anual','created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')],
            ['nombre' => 'Quincenal','descripcion' => 'prestamo quincenal', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')],
            ['nombre' => 'Mensual','descripcion' => 'prestamo mensual', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')],
        ]);
    }
}
