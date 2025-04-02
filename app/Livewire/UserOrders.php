<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order; // Asegúrate de importar el modelo Order

class UserOrders extends Component
{
    public function render()
{
    // Obtén los pedidos de los usuarios
    $orders = Order::with('user')->get(); // Asegúrate de tener la relación definida en el modelo

    return view('livewire.user-orders', [
        'orders' => $orders,
    ])->layout('layouts.app'); // Mueve ->layout() aquí
}
}