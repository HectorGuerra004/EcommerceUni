<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{

    public function showForm()
    {
        return view('/registrate'); // Ajusta la ruta de tu vista
    }

    public function store(Request $request)
    {

        // Depura los datos recibidos (elimina esto después)
    //  dd($request->all());
        // Validación de datos
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:20', 'unique:users'],
            'telefono' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Creación del usuario
        $user = User::create([
            'nombre' => $validated['nombre'],
            'apellido' => $validated['apellido'],
            'cedula' => $validated['cedula'],
            'telefono' => $validated['telefono'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Asignación de rol (con verificación)
        $clientRole = Role::firstOrCreate(
            ['nombre' => 'cliente'], // Busca o crea el rol
            ['nombre' => 'cliente']  // Datos para creación
        );
        
        $user->roles()->attach($clientRole);

        // Autenticación y redirección
        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('landing'); // Ajusta la ruta de tu vista
    }
}