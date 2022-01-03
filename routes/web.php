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

Auth::routes();


Route::get('/producto/{id_producto}'  ,                        'App\Http\Controllers\productosController@obtenerProducto');
Route::post('/actualizar-producto',                            'App\Http\Controllers\productosController@actualizarProducto');
Route::post('/borrar-producto/{id_producto}'    ,              'App\Http\Controllers\productosController@borrarProducto');
Route::post('/crearProductos',                                 'App\Http\Controllers\productosController@crearProductos');

Route::get('/obtener-producto-carrito',                         'App\Http\Controllers\carritoController@obtenerProductoCarrito');
Route::get('/obtener-productos-carrito/id_usuario/{id_usuario}','App\Http\Controllers\carritoController@obtenerProdutosCarrito');
Route::post('/borrar-producto-carrito',                         'App\Http\Controllers\carritoController@borrarProducto');
Route::post('/actualizar-producto',                             'App\Http\Controllers\carritoController@actualizarCarrito');

Route::post('/crearUsuario',                                    'App\Http\Controllers\Auth\RegisterController@createUser');

 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
