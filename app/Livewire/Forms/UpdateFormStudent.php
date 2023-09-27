<?php

namespace App\Livewire\Forms;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;
use Livewire\WithFileUploads;

class UpdateFormStudent extends Form
{
    public Student $student;

    #[Rule('required|min:3', message: 'Nome é obrigatório.')]
    public string $name;

    #[Rule('required|email', message: 'E-mail é obrigatório.')]
    public string $email;

    /**@var TemporaryUploadedFile|mixed $image
     */
    #[Rule('nullable|max:1024', message: 'Image obrigatória ou o tamanho é maior que 1024MB.')]
    public $image;

    #[Rule('required', message: 'Precisa escolher uma turma.')]
    public $section_id;

    public function setStudent(Student $student)
    {
        $this->student = $student;

        $this->name = $student->name;
        $this->email = $student->email;
        $this->section_id = $student->section_id;
    }

    public function update($class_id)
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
            'class_id' => $class_id,
            'section_id' => $this->section_id
        ]);
    }
}
