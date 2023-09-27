<?php

namespace App\Livewire\Forms;

use App\Models\Student;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class CreateFormStudent extends Form
{
    #[Rule('required|min:3', message: 'Nome é obrigatório.')]
    public string $name;

    #[Rule('required|email', message: 'E-mail é obrigatório.')]
    public string $email;

    /**@var TemporaryUploadedFile|mixed $image
     */
    #[Rule('required|max:1024', message: 'Image obrigatória ou o tamanho é maior que 1024MB.')]
    public $image;

    #[Rule('required', message: 'Precisa escolher uma turma.')]
    public $section_id;

    public function store($class_id)
    {

        $student = Student::create(
            [
                'name'=> $this->name,
                'email'=> $this->email,
                'image'=> Str::replaceFirst('public/', '', $this->image->store('public/students')),
                'class_id'=> $class_id,
                'section_id'=> $this->section_id
            ]);
    }
}
