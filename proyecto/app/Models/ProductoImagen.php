<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoImagen extends Model
{

    protected $table = 'producto_imagenes'; // Especifica el nombre correcto de la tabla

    protected $fillable = [
        'producto_id',
        'ruta_imagen'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
?>