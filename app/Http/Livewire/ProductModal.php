<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductModal extends Component
{
    public $isOpen = false;
    public $product_name;
    public $product_price;
    public $category;
    public $product_description;
    public $product_brand;

    protected $rules = [
        'product_name' => 'required|unique:products,product_name',
        'product_price' => 'required',
        'product_brand' => 'required',
        'category' => 'required'
    ];

    // Update the listener to match the emitted event
    protected $listeners = [
        'StatusModal' => 'openProductModal',
        'retreiveData',
    ];
    public function openProductModal($data){
        $this->isOpen = $data;
    }

    public function close()
    {
        $this->isOpen = false;
    }

    public function submit(){
        $this->validate();
        Product::create([
            'product_name' => $this->product_name,
            'product_brand' => $this->product_brand,
            'product_price' => $this->product_price,
            'product_description' => $this->product_description,
        ]);
        $this->resetInputFields();
        $this->close();
        $this->emit('productAdded');
    }

    public function resetInputFields(){
        $this->product_brand = "";
        $this->product_name = "";
        $this->product_price = "";
        $this->product_description = "";
        $this->category = "";
    }
    public function render()
    {
        return view('livewire.product-modal');
    }
}
