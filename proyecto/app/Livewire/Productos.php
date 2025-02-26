<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithFileUploads;
use App\Models\ProductoImagen;

class Productos extends Component
{
    use WithFileUploads;
    public $productos, $nombre, $descripcion, $precio, $stock, $imagenes, $categoria, $estado, $id_producto;
    public $modal = false;
    public function render()
    {
        $this->productos = Producto::all();
        return view('livewire.productos')
            ->layout('layouts.app'); // Especifica el layout aquí
    }

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required',
        'stock' => 'required',
        'imagenes.*' => ['required', 'image', 'mimes:jpeg,png,jpg,jpeg'],
        'categoria' => 'required',
        'estado' => 'required'
    ];

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function limpiarCampos()
    {
        $this->nombre = '';
        $this->descripcion = '';
        $this->precio = '';
        $this->stock = '';
        $this->imagenes = [];
        $this->categoria = '';
        $this->estado = '';
        $this->id_producto = '';
    }

    public function editar($id)
    {
        $producto = Producto::findOrFail($id);
        $this->id_producto = $id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->precio = $producto->precio;
        $this->stock = $producto->stock;
        $this->imagenes = $producto->imagen;
        $this->categoria = $producto->categoria;
        $this->estado = $producto->estado;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Producto::find($id)->delete();
        session()->flash('message', 'Producto eliminado correctamente');
    }

    public function guardar(){
        $this->validate();
    
        // Crear o actualizar el producto SIN campos de imagen
        $producto = Producto::updateOrCreate(['id' => $this->id_producto], [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'categoria' => $this->categoria,
            'estado' => $this->estado,
        ]);
    
        // Guardar las imágenes en la tabla separada
        if ($this->imagenes) {
            foreach ($this->imagenes as $imagen) {
                $path = $imagen->store('productos', 'public');
                
                ProductoImagen::create([
                    'producto_id' => $producto->id,
                    'ruta_imagen' => $path
                ]);
            }
        }
    
        session()->flash('message', $this->id_producto ? 'Actualizado' : 'Creado');
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
