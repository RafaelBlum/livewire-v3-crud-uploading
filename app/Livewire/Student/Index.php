<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use function League\Flysystem\Local\ensureDirectoryExists;

class Index extends Component
{
    use WithPagination;

    /**
     * URL Query Parameters
     * https://livewire.laravel.com/docs/url
    */
    #[Url(as: 'busca', keep: true, history: true)]
    public $search = '';

    /**
     * Render page and search students paginator
     */
    public function render()
    {
        $students = Student::query()
            ->when($this->search, fn ($query)=> $query->where('name', 'like', '%'.$this->search.'%'))
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->paginate(2);

        return view('livewire.student.index', [
            'students' => $students
        ]);
    }

    /**
     * Delete student
     * Storage files
     * redirect route and session message
     */
    public function delete(Student $student)
    {
        sleep(3);

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

    /**
     * Listening for events #https://livewire.laravel.com/docs/events
     *
    */
    #[On('student-create')]
    public function updateIndex($student = null)
    {
        return Student::all()->count();
    }
}
