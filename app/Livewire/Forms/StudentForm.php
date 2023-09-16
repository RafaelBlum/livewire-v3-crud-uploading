<?php

namespace App\Livewire\Forms;

use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\Form;

class StudentForm extends Form
{
    #[Rule('required|min:3', message: 'Nome é obrigatório.')]
    public string $name;

    #[Rule('required|email', message: 'E-mail é obrigatório.')]
    public string $email;

    #[Rule('required|image', message: 'Sua image é obrigatória.')]
    public $image;

    #[Rule('required|exists:classes', message: 'Precisa selecionar uma disciplina.')]
    public $class_id;

    #[Rule('required|exists:sections', message: 'Precisa escolher uma turma.')]
    public $section_id;

    public function store()
    {
        $this->validate();

        Student::create($this->all());

        session()->flash('status', 'Post successfully updated.');
    }
}
