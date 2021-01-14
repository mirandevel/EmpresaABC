<?php

namespace App\Http\Livewire\Tasks;

use App\Models\Tarea;
use Livewire\Component;
use function GuzzleHttp\Promise\task;

class Update extends Component
{

    public $hora;
    public $minuto;

    public $task;
    protected $rules = [
        'hora' => 'required',
        'minuto' => 'required',
        'task.fecha' => 'required',
        'task.ubicacion' => 'required|string',
        'task.descripcion' => 'required|string',
        'task.tec_id' => 'required|exists:App\Models\User,id',
        'task.cli_id' => 'required|exists:App\Models\Cliente,id',
    ];
    public function mount($id){
        $this->task=Tarea::find($id);
        $time= explode(":", $this->task->hora_inicio);
        $this->hora=$time[0];
        $this->minuto=$time[1];
    }
    public function render()
    {
        return view('livewire.tasks.update')->layout('layouts.app',['header'=>'Actualizar tarea']);
    }

    public function update()
    {
        $this->validate();
        $hora_inicio=$this->hora.':'.$this->minuto.':00';
        $this->task->hora_inicio=$hora_inicio;
        $this->task->save();
        $this->redirect(route('tasks'));
    }
}
