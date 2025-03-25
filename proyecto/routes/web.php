<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Productos;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/catalogo', function () {
    return view('catalogo');
})->name('catalogo');

// Ruta para mostrar el formulario de registro
Route::get('registrate', [RegisterController::class, 'showForm'])->name('registrate');

// Ruta para procesar el registro
Route::post('registrate', [RegisterController::class, 'store'])->name('registrate.submit');

// Ruta para mostrar el formulario de login
Route::get('/iniciarSesion', [LoginController::class, 'showForm'])->name('iniciarSesion');

// Ruta para procesar el login
Route::post('/iniciarSesion', [LoginController::class, 'authenticate'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil')->middleware('auth');

Route::get('/carrito', function () {
    return view('carrito');
})->name('carrito')->middleware('auth');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::delete('/cart/remove/{cartItem}', [CartController::class, 'removeFromCart'])->name('cart.remove')->middleware('auth');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['auth', CheckAdminRole::class])->group(function () {
    // Rutas protegidas para admins
    Route::get('/productos', Productos::class)->name('productos');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
