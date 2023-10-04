<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /**
     * URL Query Parameters
     * https://livewire.laravel.com/docs/url
     * https://livewire.laravel.com/docs/computed-properties
    */
    #[Url(as: 'busca', keep: true)]
    public $search = '';

    public function render()
    {
        $students = Student::query()
            ->when($this->search, fn ($query)=> $query->where('name', 'like', '%'.$this->search.'%'))
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->paginate(5);

        return view('livewire.student.index', [
            'students' => $students
        ]);
    }

    public function search()
    {
        $this->resetPage();
    }

    public function delete($student)
    {
        if ($student->image && $student->image != 'storage/default.jpg') {
            // Verifique se o arquivo de imagem existe antes de tentar excluí-lo
            if (Storage::exists('public/'.$student->image)) {
                Storage::delete('public/'.$student->image);
            }
        }

        $student->delete();

        return redirect()->route('students.index')
            ->with('status', 'Estudante deletado com sucesso!');
    }

    #[On('student-create')]
    public function updateIndex($student = null)
    {
        return Student::all()->count();
    }
}
