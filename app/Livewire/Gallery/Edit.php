<?php

namespace App\Livewire\Gallery;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    #[Rule('required|min:3', message: 'Nome é obrigatório.')]
    public string $name;

    #[Rule('required|price', message: 'Valor é obrigatório.')]
    public string $price;

    /**@var TemporaryUploadedFile|mixed $image
     */
    #[Rule('nullable|max:1024', message: 'Image obrigatória ou o tamanho é maior que 1024MB.')]
    public $image;

    public function render()
    {
        return view('livewire.gallery.edit');
    }
}
