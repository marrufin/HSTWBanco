<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Clientes\Cliente;
use PDF;

class ReportController extends Controller
{
    public function main(Request $request){
        switch ($request->method()){
            case 'GET';
                if($request->id){
                    return $this->crearPdf($request);
                }
                return $this->vista();
            case 'POST':
                return $this->obtenerClientes();
            default:
        }
    }

    private function vista(){
        return view('Report.Report');
    }
    private function obtenerClientes(){
        return Cliente::with('direccion')->get();
    }

    public function crearPdf(Request $request){
        $data = Cliente::where('id', $request->id)->with('prestamo', 'direccion')->get();
        if(!empty($data)){
            $pdf = PDF::loadView('layouts.PDF.calcular_prestamo', compact('data'));
            return $pdf->stream();
        }
    }
}