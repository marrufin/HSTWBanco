<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@home');
Route::match(['GET','POST'], '/login', 'Usuario\UserController@main')->name('login');

Route::group(['prefix' => 'Administrador', 'middleware' => 'auth'], function(){
    Route::match(['GET', 'POST', 'PUT'], '/clientes', 'Clientes\ClienteController@main');
    Route::match(['GET', 'POST', 'PUT'], '/tarjetas', 'Tarjeta\TarjetaController@main');
    Route::match(['GET', 'POST', 'PUT'], '/prestamos','Prestamos\PrestamosController@main');
    Route::match(['GET', 'POST', 'PUT'], '/cobranza','Cobranza\CobranzaController@main');
});

Route::post('/logout', 'Usuario\UserController@logout');