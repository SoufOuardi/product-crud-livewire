<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductModal extends Component
{
    public $isOpen = false;
    public $name;
    public $price;
    public $category_id;
    public $description;
    public $brand;

    protected $rules = [
        'name' => 'required|max:40|unique:products,name',
        'price' => 'required|numeric',
        'brand' => 'required|max:15',
        'description' => 'max:255',
        'category_id' => 'required|exists:categories,id'
    ];

    // Update the listener to match the emitted event
    protected $listeners = [
        'openProductModal',
        'retreiveData',
    ];
    public function openProductModal($isOpen){
        $this->isOpen = $isOpen;
    }
    

    public function close()
    {
        $this->isOpen = false;
    }
    
    public function submit()
    {
        try {
            $this->validate();
    
            Product::create([
                'name' => $this->name,
                'brand' => $this->brand,
                'price' => $this->price,
                'description' => $this->description,
                'category_id' => $this->category_id,
            ]);
            
            $this->resetInputFields();
            $this->close();
    
            $this->emit('productAdded', 'Successfully added new Product');  // Emit success event
        } catch (\Exception $e) {
            // Emit error event if something goes wrong
            $this->emit('productError', $e->getMessage());
        }
}

    public function resetInputFields(){
        $this->brand = "";
        $this->name = "";
        $this->price = "";
        $this->description = "";
        $this->category_id = "";
    }
    public function render()
    {
        return view('livewire.product-modal');
    }
}
