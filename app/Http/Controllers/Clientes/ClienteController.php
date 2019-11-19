<?php

namespace App\Http\Controllers\Clientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    public function main(Request $request){
        switch ($request->method()) {
            case 'GET':
                return $this->view();
            case 'POST':
            
            default:
                # code...
                break;
        }
    }

    private function view(){
        return view('Clientes.clientes');
    }
}
