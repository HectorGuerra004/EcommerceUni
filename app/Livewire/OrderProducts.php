<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order; // Asegúrate de importar el modelo Order

class OrderProducts extends Component
{
    public $orderId;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }

    public function render()
    {
        // Obtén el pedido y sus productos
        $order = Order::with('items.producto')->find($this->orderId);
        return view('livewire.order-products', [
            'order' => $order,
        ])->layout('layouts.app'); // Mueve ->layout() aquí
    }
}