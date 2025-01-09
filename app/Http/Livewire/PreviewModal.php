<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PreviewModal extends Component
{
    public $isPreviewBtn = false;
    public $product= null;
    protected $listeners = ['openPreview'];
    public function mount(){
        $this->product = null;
    }
    public function openPreview($id, $isPreviewBtn){
        Log::info("Opening delete page for product ID: $id");  // Check this log
        $this->product = Product::findOrFail($id);
        $this->isPreviewBtn = $isPreviewBtn;
    }

    public function close(){
        $this->isPreviewBtn = false;
    }

    public function render()
    {
        return view('livewire.preview-modal');
    }
}
