<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditModal extends Component
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
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->category_id = $this->product->category_id;
        $this->description = $this->product->description;
        $this->brand = $this->product->brand;
        $this->isEditBtn = true; 
    }
    public function close(){
        $this->isEditBtn = false;
        $this->product = null;
    }
    public function submit(){
        try {
        $this->rules['name'] = 'required|max:44|unique:products,name,' . $this->product->id;
        $this->validate();
        $this->product->name = $this->name;
        $this->product->brand = $this->brand;
        $this->product->price = $this->price;
        $this->product->description = $this->description;
        $this->product->category_id = $this->category_id;
        $this->product->save();
        $this->emit('productAdded', 'Successfully Edited The Product');
        $this->close();
    }catch(\Exception $e){
        $this->emit('productEditedError', $e->getMessage());
    }

    }
    public function mount(){
        $this->product = null;
    }

    public function render()
    {
        return view('livewire.edit-modal');
    }
}
