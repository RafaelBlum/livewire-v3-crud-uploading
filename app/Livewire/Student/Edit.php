<?php

namespace App\Livewire\Student;

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

    #[Rule('required|min:3', message: 'Nome é obrigatório.')]
    public string $name;

    #[Rule('required|email', message: 'E-mail é obrigatório.')]
    public string $email;

    #[Rule('nullable|image', message: 'Sua image é obrigatória.')]
    public $image;

    #[Rule('required', message: 'Precisa selecionar uma disciplina.')]
    public $class_id;

    #[Rule('required', message: 'Precisa escolher uma turma.')]
    public $section_id;

    public $sections = [];

    public function render()
    {
        return view('livewire.student.edit', [
            'classes' => Classes::all(),
        ]);
    }

    public function mount()
    {
        $this->fill(
            $this->student->only('name', 'class_id', 'section_id', 'email'),
        );
        $this->sections = Section::where('class_id', $this->student->class_id)->get();
    }

    public function updatedClassId($value)
    {
        $this->sections = Section::where('class_id', $value)->get();
    }

    public function update()
    {

        if($this->image){
            if ($this->student->image && $this->student->image != 'storage/default.jpg') {

                // Verifique se o arquivo de imagem existe antes de tentar excluí-lo
                if (Storage::exists('public/'.$this->student->image)) {
                    Storage::delete('public/'.$this->student->image);
                }
            }

            // Salva a nova imagem
            $this->student->image = $this->image->store('public/students');

            // Remova o prefixo "public/" do caminho da imagem
            $this->student->image = Str::replaceFirst('public/', '', $this->student->image);
        }

        $this->student->update([
            'name' => $this->name,
            'email' => $this->email,
            'class_id' => $this->class_id,
            'section_id' => $this->section_id
        ]);

        session()->flash('status', 'Estudante atualizado com sucesso!');

        return redirect(route('students.index'));
    }
}
