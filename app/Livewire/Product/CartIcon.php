<?php

namespace App\Livewire\Product;

use Livewire\Component;
use Livewire\Attributes\On;

class CartIcon extends Component
{
    
    #[On('refresh-cartIcon')]


    public function render()
    {
        return view('livewire.product.cart-icon');
    }
}
