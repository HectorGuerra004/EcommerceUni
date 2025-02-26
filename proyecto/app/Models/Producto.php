<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductoImagen;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'categoria',
        'estado'
    ];

    public function imagenes()
    {
        return $this->hasMany(ProductoImagen::class);
    }
}
