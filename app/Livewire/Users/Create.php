<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Rule(['name'=>'required|min:3'], message: ['required' => ':attribute é necessário.'], attribute: ['name' => 'O nome'])]
    public $name;

    #[Rule('required|email|unique:users', message: ':attribute é obrigatório!', attribute: ['email'=> 'O e-mail'])]
    public $email;

    #[Rule('required|min:8', message: ':as é obrigatória!', as: 'A senha')]
    public $password;

    /**@var TemporaryUploadedFile|mixed $image
     */
    #[Rule('required|max:1024', message: 'Image obrigatória ou o tamanho é maior que 1024MB.')]
    public $image;

    public function render()
    {
        return view('livewire.users.create');
    }
//
//    public function mount()
//    {
//        echo dump("mount");
//    }
//
//    public function boot()
//    {
//        echo dump("boot");
//    }

    public function save(){

        $this->validate();

        $user = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => $this->password,
            'image'=> Str::replaceFirst('public/', '', $this->image->store('public/store/users')),
        ]);

        $this->reset(['name', 'email', 'password', 'image']);

        session()->flash('success', 'Usuário criado com sucesso!');

        $this->dispatch('user-created', $user);
//        return redirect()->with('success', 'Usuário criado com sucesso!');
    }
}
