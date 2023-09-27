<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.student.index', [
            'students' => Student::paginate(10)
        ]);
    }

    public function delete($student)
    {
        dd($student);
        if ($student->image && $student->image != 'storage/default.jpg') {

            // Verifique se o arquivo de imagem existe antes de tentar excluí-lo
            if (Storage::exists('public/'.$student->image)) {
                Storage::delete('public/'.$student->image);
            }
        }

        if($student->delete()){
            return redirect()->route('students.index')
                ->with('status', 'Estudante deletado com sucesso!');
        }else{
            return redirect()->route('students.index')
                ->with('status', 'ERROR! Erro ao tentar excluir!!');
        }

        return redirect()->route('students.index')
            ->with('status', 'Estudante deletado com sucesso!');
    }
}
