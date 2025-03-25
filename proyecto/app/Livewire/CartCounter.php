<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCounter extends Component
{
    protected $listeners = ['cartUpdated' => 'updateCount'];

    public function getCountProperty()
    {
        return Auth::check() 
            ? Auth::user()->cartRelation->items->sum('cantidad') 
            : 0;
    }

    public function updateCount()
    {
        $this->emit('updateCartIndicator');
    }

    public function render()
    {
        return view('livewire.cart-counter', [
            'count' => $this->count
        ]);
    }
}