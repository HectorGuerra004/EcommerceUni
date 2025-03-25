<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    // Nuevo método para carga optimizada
    public function loadForDisplay()
    {
        return $this->load(['items.producto'])->loadCount('items');
    }

    // Total optimizado con acceso directo en BD
    public function getTotalAttribute()
    {
        return $this->items->sum(function ($item) {
            return $item->precio * $item->cantidad;
        });
    }

    // Nuevo: Actualizar contador de items automáticamente
    protected static function booted()
    {
        static::updated(function ($cart) {
            $cart->updateItemsCount();
        });
    }

    public function updateItemsCount()
    {
        $this->items_count = $this->items()->count();
        $this->save();
    }
}
