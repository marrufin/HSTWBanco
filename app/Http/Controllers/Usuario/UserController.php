<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function main(Request $request){
        switch($request->method()){
            case 'GET':
                return $this->view($request);
            case 'POST':
                return $this->login($request);
        }

    }

    private function view(Request $request){
        if(\Auth::check())
            return view('layouts.auth');
        return view('login');
    }

    private function login(Request $request){
        return \Auth::attempt(['username' => $request->username, 'password' => $request->password], false) ?
        view('layouts.auth') : 
        redirect('login')->with('status', 'Credenciales no válidas');
    }

    public function logout(){
        \Auth::logout();
        return redirect('login');
    }
}
