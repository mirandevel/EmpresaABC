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


    public $showDelete;
    public $currentId;
    protected $listeners = [
        'modalDelete' => 'modalDelete',
    ];
    public function render()
    {
        $tareas = Tarea::paginate($this->paginator);

        return view('livewire.tasks.tasks', compact('tareas'))
            ->layout('layouts.app');
    }

    public function modalDelete($id){
        $this->showDelete=true;
        $this->currentId=$id;

    }
    public function deleteTask()
    {
            Tarea::destroy($this->currentId);
            $this->redirect(route('tasks'));
    }
}
