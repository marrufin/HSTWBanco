<?php

namespace App\Modelos\Clientes;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';

    protected $fillable = array('cliente_id', 'calle', 'num_int', 'num_ext', 'entre_calles', 
                                'codigo_postal', 'colonia', 'ciudad', 'estado', 'pais');

    public function cliente(){
        return $this->belongsTo('App\Modelos\Clientes\Cliente');
    }
}
