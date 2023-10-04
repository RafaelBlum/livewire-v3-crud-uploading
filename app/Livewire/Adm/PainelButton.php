<?php

namespace App\Livewire\Adm;

use App\Models\Product;
use App\Models\Student;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class PainelButton extends Component
{
    public $users;
    public $products;
    public $students;

    public function mount()
    {
        sleep(2);
    }

    /**
     * https://livewire.laravel.com/docs/lazy
    */
    public function placeholder()
    {
        return <<<'HTML'
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200 bg-purple-600 p-2 rounded text-center">
                    lazy loading Carregando...
            </p>
        HTML;
    }

    #[On('student::created')]
    public function render()
    {
        return view('livewire.adm.painel-button', [
            $this->users = User::all()->count(),
            $this->products = Product::all()->count(),
            $this->students = Student::all()->count()
        ]);
    }
}
