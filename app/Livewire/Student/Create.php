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
    public StudentForm $form;

    public function render()
    {
        return view('livewire.student.create', [
            'classes' => Classes::all(),
            'sections' => Section::all()
        ]);
    }


    public function save()
    {


        $this->form->store();

        return redirect(route('students.index'))->with('status', 'Estudante criado com sucesso!!');
    }
}
