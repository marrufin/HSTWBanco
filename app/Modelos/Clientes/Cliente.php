<?php

namespace App\Modelos\Clientes;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";

    protected $fillable = ['nombre', 'ap_paterno', 'ap_materno', 'fecha_nac','curp','rfc', 'activo'];

    public function direccion(){
        return $this->hasOne('App\Modelos\Clientes\Direccion', 'cliente_id', 'id');
    }

    public function prestamo(){
        return $this->hasOne('App\Modelos\Prestamos\Prestamo', 'cliente_id', 'id');
    }
}