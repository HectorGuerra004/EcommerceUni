<?php

namespace App\Http\Controllers;

use App\Events\CartUpdated;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Producto; // Agregar esta línea
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Agregar esta línea
use Illuminate\Support\Facades\Auth;



class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        // Buscar el item o crear uno nuevo sin guardar
        $cartItem = $cart->items()->firstOrNew([
            'producto_id' => $request->producto_id
        ]);

        // Si el item ya existía, sumar la cantidad. Si no, establecerla
        $cartItem->cantidad = $cartItem->exists
            ? $cartItem->cantidad + $request->cantidad
            : $request->cantidad;

        // Obtener precio del producto
        $cartItem->precio = Producto::find($request->producto_id)->precio;

        // Guardar cambios
        $cartItem->save();

        // Actualizar relaciones y lanzar evento
        event(new CartUpdated($cart->fresh()));

        return back()->with('success', 'Producto añadido al carrito');
    }

    public function removeFromCart(CartItem $cartItem)
    {
        $cart = $cartItem->cart;
        $cartItem->delete();

        event(new CartUpdated($cart->fresh())); // Actualizar relación
        return back()->with('success', 'Producto eliminado del carrito');
    }
}
