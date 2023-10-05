<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;
    public $password;

    #[Title('Create Post')]
    public function render()
    {
        return view('livewire.users.create')->title('Create Test');;
    }

    public function save(){
        User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => $this->password
        ]);
    }
}
