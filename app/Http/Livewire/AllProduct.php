<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class AllProduct extends Component
{
    use WithPagination;
    public $isOpen = false;
    public $actionDropDown = false;
    public $retreivedData;
    public $isTdActionBtn = null;
    public $isEditBtn = false;
    public $isPreviewBtn = false;
    public $isDelBtn = false;

    protected $listeners = ['productAdded' => 'retrieveData'];

    public function openProductModal(){
        $this->isOpen = true;
        $this->emit('StatusModal', $this->isOpen);
    }  

    public function retrieveData(){
        $this->retreivedData = Product::all();
    }

    public function mount()
    {
        $this->retrieveData(); // Load initial data
    }

    public function openDropDown(){
        $this->actionDropDown = true;
    }
    public function tdActionBtn($id){
        Log::info("Opening delete page for product ID: $id");
        $this->isTdActionBtn = $id;
    }
    public function openDelPage($id){
        $this->isDelBtn = true;
        $this->emit('openDelPage',$id, $this->isDelBtn);
    }
    public function editBtn($id){
        $this->isEditBtn = true;
        $this->emit('editBtn',$id,$this->isEditBtn);
    }

    public function openPreview($id){
        $this->isPreviewBtn = true;
        $this->emit('openPreview',$id,$this->isPreviewBtn);
    }

    public function deleteAll(){
        Product::truncate();
        $this->retrieveData();
    }

    public function render()
    {
        return view('livewire.all-product');
    }
}
