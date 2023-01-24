<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//ENDPOINTS DE API REST
Route::get('/productos', 'App\Http\Controllers\ProductosController@GetProductos');
Route::get('/producto/{id}', 'App\Http\Controllers\ProductosController@GetProducto');
Route::post('/save_producto', 'App\Http\Controllers\ProductosController@SaveProducto');
Route::get('/delete_producto/{id}', 'App\Http\Controllers\ProductosController@DeleteProducto');

Route::get('/variaciones', 'App\Http\Controllers\ProductosController@GetVariaciones');
Route::get('/variaciones/{id}', 'App\Http\Controllers\ProductosController@GetVariacionesByProductoId');
Route::get('/delete_variacion/{id}', 'App\Http\Controllers\ProductosController@DeleteVariacion');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
