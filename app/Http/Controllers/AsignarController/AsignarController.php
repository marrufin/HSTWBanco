<?php

namespace App\Http\Controllers\AsignarController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Clientes\Cliente;

class AsignarController extends Controller
{
    public function main(Request $request){
        switch ($request->method()){
            case 'GET';
                return $this->vista();
            case 'POST':
                return $this->obtenerClientes();
            default:
        }
    }

    private function vista(){
        return view('Asignacion_de_Prestamos.Asignar_Prestamos');
    }

    private function obtenerClientes(){
        return Cliente::with('direccion')->get();
    }
}