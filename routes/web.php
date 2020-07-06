<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/teste/{id}/', function ($id) {
    echo $id;
    echo "<br>";

});


Route::get('produtos/{n1}/{n2}','MeuControlador@produtos')
    ->where('n1','[0-9]+')
        ->where('n2','[A-Za-z]+')
            ->name('testinho');



Route::resource('clientes', 'clientesController');

