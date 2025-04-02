<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $cart;
    public $payment_reference = '';
    public $shipping = [
        'name' => '',
    ];
    public $orderConfirmed = false;

    protected $rules = [
        'payment_reference' => 'required|min:4|max:20',
    ];

    public function mount()
    {
        $this->cart = Cart::with(['items.producto.imagenes'])
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->shipping['name'] = Auth::user()->nombre; // Rellena el nombre del usuario
    }

    public function submitOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $this->cart->total,
            'status' => 'pendiente',
            'payment_reference' => $this->payment_reference,
            'shipping_info' => $this->shipping,
        ]);

        foreach ($this->cart->items as $item) {
            $order->items()->create([
                'producto_id' => $item->producto_id,
                'quantity' => $item->cantidad,
                'price' => $item->precio,
            ]);
        }

        $this->cart->items()->delete(); // Vaciar carrito
        $this->orderConfirmed = true; // Mostrar mensaje de confirmación
    }

    public function getTotalProperty()
    {
        return $this->cart->items->sum(function ($item) {
            return $item->cantidad * $item->precio;
        });
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}