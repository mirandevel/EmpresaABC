<?php

namespace App\Http\Livewire\Tasks;

use App\Models\Tarea;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{

public $hora_inicio;
public $fecha;
public $ubicacion;
public $descripcion;
public $adm_id;
public $tec_id;
public $cli_id;
public $hora;
public $minuto;

    protected $rules = [
        'hora' => 'required',
        'minuto' => 'required',
        'fecha' => 'required',
        'ubicacion' => 'required|string',
        'descripcion' => 'required|string',
        'tec_id' => 'required|exists:App\Models\User,id',
        'cli_id' => 'required|exists:App\Models\Cliente,id',
    ];

    public function render()
    {
        return view('livewire.tasks.create');
    }
    public function usr(){
        $this->validate();

        $this->hora_inicio=$this->hora.':'.$this->minuto.':00';
        // Execution doesn't reach here if validation fails.

        Tarea::create([
            'hora_inicio' => $this->hora_inicio,
            'fecha' => $this->fecha,
            'ubicacion' => $this->ubicacion,
            'descripcion' => $this->descripcion,
            'estado' => true,
            'adm_id' => Auth::user()->id,
            'tec_id' => $this->tec_id,
            'cli_id' => $this->cli_id,
        ]);
        $this->redirect('tasks');

    }
}
