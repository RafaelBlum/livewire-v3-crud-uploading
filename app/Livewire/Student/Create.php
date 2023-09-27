<?php

namespace App\Livewire\Student;

use App\Livewire\Forms\CreateFormStudent;
use App\Livewire\Forms\StudentForm;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;


class Create extends Component
{
    use WithFileUploads;

    public CreateFormStudent $form;

    #[Rule('required', message: 'Precisa selecionar uma disciplina.')]
    public $class_id;

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

        $this->form->store(class_id: $this->class_id);

        return redirect(route('students.index'))
            ->with('status', 'Student successfully created.');
    }


    public function updatedClassId($value)
    {
        $this->sections = Section::where('class_id', $value)->get();
    }
}
