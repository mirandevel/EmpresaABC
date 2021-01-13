<?php

namespace App\Http\Livewire\Tasks;

use App\Models\Tarea;
use Livewire\Component;

class More extends Component
{
    public $tarea;
    public function mount($id){
        $this->tarea=Tarea::find($id);
        $this->tarea->load('technical');
        $this->tarea->load('administrator');
        $this->tarea->load('client');
    }
    public function render()
    {
        return view('livewire.tasks.more')->layout('layouts.app',['header'=>'Más detalles de la tarea']);
    }
}
