<?php

namespace App\Livewire\Gallery;

use App\Models\Product;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(as: 'busca', keep: true, history: true)]
    public $search = '';

    /**
     * List products
     * Pagination
    */
    public function render()
    {
        $products = Product::query()
            ->when($this->search, fn ($query)=> $query->where('product', 'like', '%'.$this->search.'%'))
            ->paginate(2);

        return view('livewire.gallery.index',[
            'products' => $products
        ]);
    }

    /**
     *
     */
    public function delete(Product $product)
    {
        if ($product->image && $product->image != 'storage/default.jpg') {
            // Verifique se o arquivo de imagem existe antes de tentar excluí-lo
            if (Storage::exists('public/'.$product->image)) {
                Storage::delete('public/'.$product->image);
            }
        }

        $product->delete();

        return redirect()->route('gallerys.index')
            ->with('status', 'Product deletado com sucesso!');
    }

    /**
     *
     */
    #[Computed]
    public function products()
    {
        return Product::all();
    }
}
