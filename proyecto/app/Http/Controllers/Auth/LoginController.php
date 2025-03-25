<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart; 
use App\Models\User;

class LoginController extends Controller
{
    // Mostrar formulario de login
    public function showForm()
    {
        return view('iniciarSesion'); // Ajusta la ruta de tu vista
    }

    // Procesar el login
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            $user->cart; // ✅ Accede al accesor como propiedad

            // Verificar roles
            if ($user->roles->contains('nombre', 'admin')) {
                return redirect()->route('productos');
            }

            return redirect()->route('catalogo');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
