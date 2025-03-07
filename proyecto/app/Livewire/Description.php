<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto; // Importa el modelo Producto

class Description extends Component
{
    public $showFullDescription = false;
    public $shortDescription;
    public $fullDescription;
    public $remainingDescription;
    public $showMoreButton = false;
    public $producto; // Propiedad para almacenar el producto

    public function mount($productoId)
    {
        $this->producto = Producto::find($productoId); // Busca el producto por ID

        if ($this->producto) { // Verifica si el producto existe
            $description = $this->producto->descripcion; // Obtén la descripción del producto
            $this->fullDescription = $description;
            $this->shortDescription = $this->getShortDescription($description);
            $this->remainingDescription = $this->getRemainingDescription($description);
            $this->showMoreButton = strlen($description) > 200; // Condición para mostrar el botón
        }
    }

    public function toggleDescription()
    {
        $this->showFullDescription = !$this->showFullDescription;
    }

    public function getShortDescription($description)
    {
        if (strlen($description) > 200) {
            return substr($description, 0, 200) . '...';
        } else {
            return $description;
        }
    }

    public function getRemainingDescription($description)
    {
        if (strlen($description) > 200) {
            return substr($description, 200);
        } else {
            return '';
        }
    }

    public function render()
    {
        return view('livewire.description');
    }
}