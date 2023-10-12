<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    #[On('user-created')]
    public function updateList($user = null)
    {
        session()->flash('success', 'Atualizando lista...');
    }

    #[Computed()]
    public function users()
    {
        return User::paginate(2);
    }
    
    public function render()
    {

        return view('livewire.users.users',
        [
            'users' => User::paginate(2),
            'tot' => User::all()->count(),
        ]);
    }
}
