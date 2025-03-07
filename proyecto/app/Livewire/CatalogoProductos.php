<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;

class CatalogoProductos extends Component
{
    public $productos;

    public function render()
    {
        $this->productos = Producto::all(); // O cualquier otra lógica para obtener tus productos
        return view('livewire.catalogo-productos');
    }
}