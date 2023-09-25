<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        return view('livewire.users.users',
        [
            'users' => User::paginate(3)
        ]);
    }
}
