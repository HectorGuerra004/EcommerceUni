<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class CatalogoProductos extends Component
{
    use WithPagination;

    #[Url(history: true)] // Mantiene el historial de navegación
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage(); // Reinicia la paginación al buscar
    }

    public function render()
    {
        $productos = Producto::when($this->search, function ($query) {
                $query->where('nombre', 'like', '%'.$this->search.'%')
                      ->orWhere('descripcion', 'like', '%'.$this->search.'%')
                      ->orWhere('categoria', 'like', '%'.$this->search.'%');
            })
            ->with('imagenes')
            ->paginate(12);

        return view('livewire.catalogo-productos', [
            'productos' => $productos
        ]);
    }
}