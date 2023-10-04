<?php

namespace App\Livewire\Raffle;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Sortition extends Component
{
    public $winner = '';
    public $git;

    public function render(): View
    {
        return view('livewire.raffle.sortition');
    }

    public function mount($git = null)
    {
        $this->git = $git;
    }

    /**
     * wire:stream
     * https://livewire.laravel.com/docs/wire-stream
    */
    public function run()
    {
        $students = Student::query()->inRandomOrder()->get();

        foreach ($students as $stud){
            $this->stream('winner', $stud->name, true);
            usleep(199999);
        }

        $winner = Student::query()->inRandomOrder()->first();
        $this->winner = $winner->name;
        $this->js('confetti()');
    }
}
