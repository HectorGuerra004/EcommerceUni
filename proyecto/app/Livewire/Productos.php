<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Productos extends Component
{
    public $productos, $nombre, $descripcion, $precio, $stock, $imagen, $categoria, $estado, $id_producto;
    public $modal = false;
    public function render()
    {
        $this->productos = Producto::all();
        return view('livewire.productos')
            ->layout('layouts.app'); // Especifica el layout aquí
    }

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
        $this->imagen = '';
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
        $this->imagen = $producto->imagen;
        $this->categoria = $producto->categoria;
        $this->estado = $producto->estado;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Producto::find($id)->delete();
        session()->flash('mensaje', 'Producto eliminado correctamente');
    }

    public function guardar(){
        Producto::updateOrCreate(['id' => $this->id_producto], [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'imagen' => $this->imagen,
            'categoria' => $this->categoria,
            'estado' => $this->estado,
        ]);

        session()->flash('mensaje', $this->id_producto ? 'Producto actualizado correctamente' : 'Producto creado correctamente');

        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
