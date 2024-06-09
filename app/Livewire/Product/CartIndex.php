<?php

namespace App\Livewire\Product;

use Livewire\Component;

class CartIndex extends Component
{
    public function changeCount($id, $change)
    {
        \Cart::update($id, array(
            'quantity' => $change
        ));
    }
    public function delete($id) {
        \Cart::remove($id);
        $this->dispatch('refresh-cartIcon')->to('product.cartIcon');
    }
    public function render()
    {
        return view('livewire.product.cart-index')->extends('layouts.app')->section('content');
    }
}
