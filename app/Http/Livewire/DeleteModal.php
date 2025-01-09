<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class DeleteModal extends Component
{
    public $isDelBtn = false;
    public $thisProduct = null;
    public $listeners = ['openDelPage'];

    public function openDelPage($id){
        $this->thisProduct = Product::findOrFail($id);
        $this->isDelBtn = true;
    }
    public function close(){
        $this->isDelBtn = false;
    }

    public function deleteRow(){
        try {
            $this->thisProduct->delete();
            $this->emit('productAdded');
            $this->close();
        }catch (\Exception $e){
            $this->emit('productError', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}
