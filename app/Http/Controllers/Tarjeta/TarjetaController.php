<?php

namespace App\Http\Controllers\Tarjeta;

use Illuminate\Http\Request;
use App\Modelos\Clientes\Cliente;
use App\Modelos\Tarjetas\Tarjeta;
use App\Http\Controllers\Controller;

class TarjetaController extends Controller
{
    public function main(Request $request){
        switch($request->method()){
            case 'GET':
                return $this->vista();
            case 'POST':
                if($request->evento == 'buscarCliente'){
                    return $this->buscarCliente($request);
                }
                return $this->crearTarjeta($request);
        }
    }

    private function vista (){
        return view('Tarjetas.tarjeta');
    }

    private function buscarCliente(Request $request){
        return Cliente::LeftJoin('tarjetas', function($leftjoin){
            $leftjoin->on('clientes.id', 'tarjetas.cliente_id');
        })
        ->LeftJoin('creditos', function($leftjoin){
            $leftjoin->on('tarjetas.id', 'creditos.tarjeta_id');
        })
        ->where(function($query) use($request){
            $query->where('clientes.nombre', $request->dato)->orWhere('clientes.rfc', $request->dato);
        })
        ->select(\DB::raw("concat(clientes.nombre,' ', clientes.ap_paterno, ' ', clientes.ap_materno) as nombre"), 'clientes.id as cliente_id', 'tarjetas.numero', 
        'creditos.comportamiento')->get();
    }

    private function crearTarjeta(Request $request){
        $tarjeta = new Request($request->tarjeta);
        $card = new Tarjeta();
        $tarjeta->cardNumber = \preg_replace('/\s+/', '', $tarjeta->cardNumber);
        $card->cliente_id = $tarjeta->cliente_id;
        $card->marca_id = $tarjeta->cardBrand;
        $card->numero = $tarjeta->cardNumber;
        $card->mes_vencimieto = $tarjeta->cardMonth;
        $card->anio_vencimiento = $tarjeta->cardYear;
        $card->save();
        return response()->json(['msg' => 'Tarjeta Creada correctamente']);
    }

    
}
