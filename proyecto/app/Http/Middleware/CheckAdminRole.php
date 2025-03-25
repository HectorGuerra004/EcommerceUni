<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario está autenticado y tiene rol de admin
        if (Auth::check() && Auth::user()->roles->contains('nombre', 'admin')) {
            return $next($request);
        }

        // Si no es admin, redirigir o abortar
        abort(403, 'Acceso no autorizado');
    }
}