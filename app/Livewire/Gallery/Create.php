<?php

namespace App\Livewire\Gallery;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class Create extends Component
{

    use WithFileUploads;

    #[Rule('required|min:3', message: 'Nome do produto é obrigatório.')]
    public $product = '';

    #[Rule('required|price', message: 'Valor do produto é obrigatório.')]
    public $price = '';

    #[Rule('required|image', message: 'Image ilustrativa do produto é obrigatório.')]
    public $image;

    public function render()
    {
        return view('livewire.gallery.create');
    }

    public function save(): void
    {
        $this->validate();
//        dd('Salvando produto', $this->product, $this->price, $this->image); // Just for demonstration, for now
        session()->flash('status', 'Produto criado com sucesso!');
    }
}
