<?php

namespace App\Livewire\Student;

use App\Livewire\Forms\UpdateFormStudent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    
    public Student $student;

    public UpdateFormStudent $form;

    #[Rule('required', message: 'Precisa selecionar uma disciplina.')]
    public $class_id;

    public $sections = [];

    public function render()
    {
        return view('livewire.student.edit', [
            'classes' => Classes::all(),
        ]);
    }

    public function mount()
    {
        $this->form->setStudent($this->student);

        $this->fill(
            $this->student->only('class_id'),
        );
        $this->sections = Section::where('class_id', $this->student->class_id)->get();
    }

    public function updatedClassId($value)
    {
        $this->sections = Section::where('class_id', $value)->get();
    }

    public function update()
    {
        $this->validate();

        $this->form->update($this->class_id);

        return redirect()->route('students.index')
            ->with('status', 'Estudante atualizado com sucesso!');
    }
}
