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

    public function delete()
    {

    }

    /**
     * https://livewire.laravel.com/docs/lazy
    */
    public function placeholder()
    {
        return view('admin/master/skeletons/painel');
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
