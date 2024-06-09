<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    public function addToCart(Product $product){
        if (\Cart::get($product->id)==null) {
            \Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'price' => $product->price,
                'quantity' => 1,
                'associatedModel' => $product
            ]);
            $this->dispatch('refresh-cartIcon')->to('product.cartIcon');
            $this->alert('success','product '.$product->name.' added to cart'
            ,['toast'=>true,'position'=>'bottom-start']);
        }else{
            $this->alert('error','product '.$product->name.' added to cart before'
            ,['toast'=>true,'position'=>'bottom-start']);
        }
    }

    public function render()
    {
        return view('livewire.product.index',['products'=>Product::all()])->extends('layouts.app')->section('content');
    }
}
