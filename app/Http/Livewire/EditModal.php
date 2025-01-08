<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditModal extends Component
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

    public $product = null;
    public $isEditBtn = false;
    protected $listeners = [
        'editBtn',
    ];
    public function editBtn($id)
    {
        Log::info("Opening delete page for product ID: $id");  // Check this log
        $this->product = null;
        $this->product = Product::findOrFail($id);
        $this->product_name = $this->product->product_name;
        $this->product_price = $this->product->product_price;
        $this->category = $this->product->category;
        $this->product_description = $this->product->product_description;
        $this->product_brand = $this->product->product_brand;
        $this->isEditBtn = true; 
    }
    public function close(){
        $this->isEditBtn = false;
        $this->product = null;
    }
    public function submit(){
        $this->validate();
        $this->product->product_name = $this->product_name;
        $this->product->product_brand = $this->product_brand;
        $this->product->product_price = $this->product_price;
        $this->product->product_description = $this->product_description;
        $this->product->category = $this->category;
        $this->product->save();
        $this->emit('productAdded');
        $this->close();
        $this->product = null;
    }
    public function mount(){
        $this->product = null;
    }

    public function render()
    {
        return view('livewire.edit-modal');
    }
}
