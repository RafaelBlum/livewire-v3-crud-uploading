<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    #[On('user-created')]
    public function updateList($user = null)
    {

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
