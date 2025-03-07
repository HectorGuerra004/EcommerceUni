<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Productos;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('landing');
});
Route::get('/catalogo', function () {
    return view('catalogo');
});
Route::get('/registrate', function () {
    return view('registrate');
});
Route::get('/iniciarSesion', function () {
    return view('iniciarSesion');
});


Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/productos', Productos::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
