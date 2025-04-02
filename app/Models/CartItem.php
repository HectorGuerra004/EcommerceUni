<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $guarded = [];

    // ✅ Cambié el nombre a 'cantidad' para mejor semántica
    protected $fillable = ['cart_id', 'producto_id', 'precio', 'cantidad'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class)
            ->withDefault([ // Protege contra productos eliminados
                'nombre' => 'Producto eliminado',
                'precio' => 0
            ]);
    }

    // Nuevo: Subtotal calculado
    public function getSubtotalAttribute()
    {
        return $this->precio * $this->cantidad;
    }
    
}