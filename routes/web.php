<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ClienteController;

Route::apiResource('clientes', ClienteController::class);

// rutas para Ventas
use App\Http\Controllers\VentasController;
Route::apiResource('ventas', VentasController::class);
