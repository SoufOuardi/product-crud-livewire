<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class AllProduct extends Component
{
    use WithPagination;
    public $actionDropDown = false;
    public $retreivedData;
    public $isTdActionBtn = null;

    protected $listeners = ['productAdded' => 'retrieveData'];

    public function openProductModal(){
        $this->emit('openProductModal', true);
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
        $this->isTdActionBtn = $id;
    }
    public function openDelPage($id){
        $this->emit('openDelPage',$id, true);
    }
    public function editBtn($id){
        $this->emit('editBtn',$id,true);
    }

    public function openPreview($id){
        $this->emit('openPreview',$id,true);
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
