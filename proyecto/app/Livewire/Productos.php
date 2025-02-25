<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Productos extends Component
{
    public $productos;
    public function render()
    {
        $this->productos = Producto::all();
        return view('livewire.productos')
            ->layout('layouts.app'); // Especifica el layout aquí
    }
}
