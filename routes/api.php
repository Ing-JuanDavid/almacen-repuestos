<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleVentaController;

// Rutas para los controladores tipo API
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('productos', ProductoController::class);
// Route::apiResource('ventas', VentaController::class);
// Route::apiResource('detalles-ventas', DetalleVentaController::class);
