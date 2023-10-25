<?php

namespace App\Livewire\Gallery;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Product $product;

    /**
     * Propriedade auxiliar para utilização de uma view única de update/create
    */
    public $productId;

    #[Rule('required|min:3', message: 'Nome é obrigatório.')]
    public string $description;

    #[Rule('required', message: 'Valor é obrigatório.')]
    public string $price;

    /**@var TemporaryUploadedFile|mixed $image
     */
    #[Rule('nullable|max:1024', message: 'Image obrigatória ou o tamanho é maior que 1024MB.')]
    public $image;

    public function render()
    {
        return view('livewire.gallery.edit');
    }

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->productId = $product->id;

        $this->description = $this->product->product;
        $this->price = $this->product->price;
    }

    public function update(Product $product)
    {
        sleep(3);

        if($this->productId){
            $this->product->product = $this->description;
            $this->product->price = $this->price;

            /**
             * Verificando se o usuário escolheu atualizar a imagem.
            */
            if($this->image){
                if ($this->product->image && $this->product->image != 'storage/default.jpg') {

                    // Verifique se o arquivo de imagem existe antes de tentar excluí-lo
                    if (Storage::exists('public/'.$this->product->image)) {
                        Storage::delete('public/'.$this->product->image);
                    }
                }

                // Salva a nova imagem
                $this->product->image = $this->image->store('public/products');

                // Remova o prefixo "public/" do caminho da imagem
                $this->product->image = Str::replaceFirst('public/', '', $this->product->image);
            }

            $this->product->update([
                'product'   => $this->description,
                'price'     => $this->price
            ]);

            $this->reset('product', 'price', 'image');

            return redirect()->route('gallerys.index')
                ->with('status', 'Produto atualizado com sucesso!');
        }
    }
}
