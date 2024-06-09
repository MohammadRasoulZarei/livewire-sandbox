<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use WithFileUploads,LivewireAlert;
    public $edit = 0;
    public $title, $description, $price, $image;
    public function updatedImage($imgae)
    {
        $this->validate([
            'image' => 'max:5000'
        ]);
    }
    public function createProduct()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'integer|min:2',
            'image' => 'nullable|image|max:5000'
        ]);
        $data = $this->except('edit');
        $imgaeName = makeNameFile($this->image);
        $data['image'] = $imgaeName;
        $this->image->storeAs('products', $imgaeName);
        Product::create($data);
        $this->reset();
        $this->dispatch('swal',[
            'title'=> "success",
            'text'=> "the product created.",
            'icon'=> "success",
            'confirmButtonText'=>'cool'
        ]);
    }
    public function render()
    {
        return view('livewire.product.create')->extends('layouts.app')->section('content');
    }
}
