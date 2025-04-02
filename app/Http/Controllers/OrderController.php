<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function update(Request $request, Order $order)
    {
        // Validar el nuevo estado
        $validated = $request->validate([
            'status' => 'required|in:pendiente,aceptada,denegada'
        ]);
        
        // Actualizar el pedido
        $order->update([
            'status' => $validated['status']
        ]);
        
        // Redireccionar con mensaje de éxito
        return back()->with('success', 'Estado actualizado correctamente');
    }
}