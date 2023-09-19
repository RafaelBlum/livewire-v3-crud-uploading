<?php

namespace App\Livewire\Gallery;

use App\Models\Product;
use App\Models\Student;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class Create extends Component
{

    use WithFileUploads;

    #[Rule('required|min:3')]
    public string $product;

    #[Rule('required')]
    public string $price;

    /**@var TemporaryUploadedFile|mixed $image
    */
    #[Rule('required|max:1024', message: 'Image obrigatória ou o tamanho é maior que 1024MB.')]
    public $image;

    public function render()
    {
        return view('livewire.gallery.create');
    }

    public function save()
    {
        $this->validate();
        Product::query()->create([
            'product'   => $this->product,
            'price'     => $this->price,
            'image'     => Str::replaceFirst('public/', '', $this->image->store('public/products'))
        ]);

        $this->reset('product', 'price', 'image');

        session()->flash('status', 'Produto cadastrado com sucesso!');

        return redirect(route('gallerys.create'));
    }
}
