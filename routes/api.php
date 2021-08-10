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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    //->middleware('auth:api')
    Route::resource('clientes', App\Http\Controllers\Api\v1\ClientesController::class);
    Route::resource('produtos', App\Http\Controllers\Api\v1\ProdutosController::class);
    Route::resource('pedidos', App\Http\Controllers\Api\v1\PedidosController::class);
});
