<?php

namespace App\Http\Livewire\Tasks;

use App\Models\Tarea;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Tasks extends Component
{
    public $searchName = '';
    public $type = '';
    public $paginator = 5;

    public $userName = '...';
    public $user;
    use WithPagination;

    public function render()
    {
        $tareas = Tarea::paginate($this->paginator);

        return view('livewire.tasks.tasks', compact('tareas'))
            ->layout('layouts.app');
    }
}
