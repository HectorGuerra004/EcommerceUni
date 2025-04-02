<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class AddToCartButton extends Component
{
    public Producto $producto;
    public $cantidad = 1;
    public $inCart = false;
    public $cartItemId;

    public function mount(Producto $producto)
    {
        $this->producto = $producto;
        $this->checkCartStatus();
    }

    private function checkCartStatus()
    {
        if (Auth::check()) {
            $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
            $item = $cart->items()->where('producto_id', $this->producto->id)->first();
            
            if ($item) {
                $this->inCart = true;
                $this->cartItemId = $item->id;
                $this->cantidad = $item->cantidad;
            }
        }
    }

    public function addToCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        $cartItem = $cart->items()->updateOrCreate(
            ['producto_id' => $this->producto->id],
            [
                'cantidad' => $this->cantidad,
                'precio' => $this->producto->precio
            ]
        );

        $this->inCart = true;
        $this->cartItemId = $cartItem->id;
        $this->dispatch('cartUpdated');
    }

    public function increment()
    {
        $this->cantidad++;
        $this->updateCart();
    }

    public function decrement()
    {
        if ($this->cantidad > 1) {
            $this->cantidad--;
            $this->updateCart();
        }
    }

    private function updateCart()
    {
        CartItem::where('id', $this->cartItemId)
            ->update(['cantidad' => $this->cantidad]);
            
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}