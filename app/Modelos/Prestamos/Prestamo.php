<?php

namespace App\Modelos\Prestamos;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = "prestamos";

    protected $fillable = ['cliente_id', 'tipo_id', 'tiempo_anios', 'interes','monto','activo', 'fecha_pago'];

}
