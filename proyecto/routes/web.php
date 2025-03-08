<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Productos;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('landing');
})->name('landing');
Route::get('/catalogo', function () {
    return view('catalogo');
});

// Ruta para mostrar el formulario de registro (si lo necesitas)
Route::get('registrate', [RegisterController::class, 'showForm'])->name('registrate');

// Ruta para procesar el registro
Route::post('registrate', [RegisterController::class, 'store'])->name('registrate.submit');


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
