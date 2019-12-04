<?php

namespace App\Http\Controllers\Prestamos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Clientes\Cliente;

class PrestamosController extends Controller
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
        return view('Prestamos.prestamos');
    }

    private function obtenerClientes(){
        return Cliente::with('direccion')->get();
    }
}