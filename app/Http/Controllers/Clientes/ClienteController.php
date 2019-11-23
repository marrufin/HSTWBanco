<?php

namespace App\Http\Controllers\Clientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Clientes\Cliente;
use App\Modelos\Clientes\Direccion;


class ClienteController extends Controller
{
    public function main(Request $request){
        switch ($request->method()) {
            case 'GET':
                return $this->vista();
            case 'POST':
                if($request->evento == 'crear'){
                    return $this->crear($request);
                }
                return $this->obtenerClientes();
            case 'PUT':
                return $this->actualizar($request);
        }
    }

    private function vista(){
        return view('Clientes.clientes');
    }

    private function obtenerClientes(){
        return Cliente::with('direccion')->get();
    }

    private function crear(Request $request){
        $reqCliente = new Request($request->cliente);
        $this->validarCliente($reqCliente);
        $reqDireccion = new Request($request->cliente['direccion']);
        $this->validarDireccion($reqDireccion);
        $cliente = Cliente::create($reqCliente->all());
        $cliente->direccion()->create($reqDireccion->all());
        return response()->json(['msg' => 'Cliente Creado correctamente']);

    }

    private function actualizar(Request $request){
        $reqCliente = new Request($request->cliente);
        $reqDireccion = new Request($request->cliente['direccion']);
        $cliente = Cliente::find($reqCliente->id);
        $this->validarCliente($reqCliente, $cliente->id);
        if(empty($cliente)){
            return response()->json(['msg' => 'No se encontró el cliente'],422);
        }
        $this->validarDireccion($reqDireccion);
        $cliente->update($reqCliente->all());
        $cliente->direccion()->update($reqDireccion->all());
        return response()->json(['msg' => 'Cliente editado correctamente']);
    }

    private function validarCliente(Request $reqCliente,$cliente_id = NULL){
        $this->validate($reqCliente, [
            'nombre' => 'required|regex:/^[\pL\s]+$/u|max:100',
            'ap_paterno' => 'required|regex:/^[\pL\s]+$/u|max:100',
            'ap_materno' => 'required|regex:/^[\pL\s]+$/u|max:100',
            'fecha_nac' => 'nullable|date',
            'curp' => 'required|max:50|unique:clientes,curp,'.$cliente_id,
            'rfc' => 'required|max:50|unique:clientes,rfc,'.$cliente_id      
        ]);
        
    }

    private function validarDireccion(Request $req){
        $this->validate($req,[
            'calle' => 'required|max:50',
            'num_int' => 'nullable|numeric',
            'num_ext' => 'nullable|numeric',
            'entre_calles' => 'nullable|max:100',
            'codigo_postal' => 'nullable|numeric',
            'colonia' => 'required|max:100',
            'ciudad' => 'required|max:100',
            'estado' => 'required|max:100',
            'pais' => 'required|max:100'
        ]);
    }
}
