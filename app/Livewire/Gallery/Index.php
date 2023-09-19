<?php

namespace App\Livewire\Gallery;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.gallery.index',[
            'products' => Product::paginate(3)
        ]);
    }
}
