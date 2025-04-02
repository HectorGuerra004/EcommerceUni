<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Importa el modelo Producto

class ProductoController extends Controller
{
    public function show($id)
    {
        // Carga las imágenes relacionadas
        $producto = Producto::with('imagenes')->find($id);

        if (!$producto) {
            abort(404);
        }

        return view('producto', compact('producto'));
    }
}
