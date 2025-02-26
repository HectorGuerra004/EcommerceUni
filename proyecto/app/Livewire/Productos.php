<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Productos extends Component
{
    public $productos,$id,$nombre,$descripcion,$precios,$tock,$imagen,$categoria,$estado;
    public $modal=false;
    
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
    public function abrirModal(){
        $this->modal=true;
    }
    public function cerrarModal(){
        $this->modal=false;
    }
    public function limpiarCampos(){
        $this->id="";
        $this->nombre="";
        $this->descripcion='';
        $this->precios=0;
        $this->tock=0;
        $this->imagen="";
        $this->categoria="";
        $this->estado="";

    }
    public function editar($id)
    {
        $producto=producto::findOrFail($id);
        $this->id=$id;
        $this->nombre=$producto->nombre;
        $this->descripcion=$producto->descripcion;
        $this->precios=$producto->precios;
        $this->tock=$producto->tock;
        $this->imagen=$producto->imagen;
        $this->categoria=$producto->categoria;
        $this->estado=$producto->estado;
    }





}
