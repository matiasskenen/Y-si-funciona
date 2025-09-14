<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Tus rutas de siempre, sin auth.
|
*/

# Página de inicio
Route::get('/', function () {
    return redirect()->route('productos.index');
});

# CRUD de productos (sin login)
Route::resource('productos', ProductoController::class);
