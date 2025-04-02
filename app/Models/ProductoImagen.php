<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; // Importa la clase Storage


class ProductoImagen extends Model
{

    protected $table = 'producto_imagenes'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'producto_id',
        'ruta_imagen'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function getUrlImagenAttribute()
    {
        
        return Storage::url($this->ruta_imagen);
        
    }
}
?>