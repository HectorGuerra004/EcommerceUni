<?php
// app/Events/CartUpdated.php
namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Cart;

class CartUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
}