<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartDropdown extends Component
{
    protected $listeners = ['cartUpdated' => 'refreshCart'];

    public function refreshCart()
    {
        $this->dispatch('updateCartIndicator');
    }

    public function removeItem($itemId)
    {
        $item = CartItem::findOrFail($itemId);
        
        if ($item->cart->user_id !== Auth::id()) {
            abort(403);
        }
        
        $item->delete();
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        $cart = Auth::user()->cartRelation ?? null;
        $cart?->load('items.producto');

        return view('livewire.cart-dropdown', [
            'cart' => $cart,
            'total' => $cart?->total ?? 0,
            'count' => $cart?->items->sum('cantidad') ?? 0
        ]);
    }
}