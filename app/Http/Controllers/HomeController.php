<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        if(\Auth::check())
            return view('layouts.auth');
        return redirect('login');
    }
}
