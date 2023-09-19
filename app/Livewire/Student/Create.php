<?php

namespace App\Livewire\Student;

use App\Livewire\Forms\StudentForm;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;


class Create extends Component
{
    use WithFileUploads;

    #[Rule('required|min:3', message: 'Nome é obrigatório.')]
    public string $name;

    #[Rule('required|email', message: 'E-mail é obrigatório.')]
    public string $email;

    #[Rule('required|image', message: 'Sua image é obrigatória.')]
    public $image;

    #[Rule('required', message: 'Precisa selecionar uma disciplina.')]
    public $class_id;

    #[Rule('required', message: 'Precisa escolher uma turma.')]
    public $section_id;


    public $sections = [];

    public function render()
    {
        return view('livewire.student.create', [
            'classes' => Classes::all(),
        ]);
    }


    public function save()
    {
        $this->validate();

        $student = Student::create(
            $this->only(['name', 'email', 'class_id', 'section_id'])
        );

        $student->addMedia($this->image)
            ->toMediaCollection();

//        session()->flash('status', 'Post successfully updated.');

        return redirect(route('students.index'))
            ->with('status', 'Student successfully created.');
    }


    public function updatedClassId($value)
    {
        $this->sections = Section::where('class_id', $value)->get();
    }
}
