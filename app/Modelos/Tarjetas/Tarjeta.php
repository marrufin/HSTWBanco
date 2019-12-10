<?php

namespace App\Modelos\Tarjetas;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table = "tarjetas";

    protected $fillable = ['cliente_id', 'marca_id', 'numero', 'mes_vencimieto','tipo','anio_vencimiento'];
}
