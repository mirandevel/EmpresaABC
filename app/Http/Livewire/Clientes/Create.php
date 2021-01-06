<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Cliente;
use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $nombre;
    public $direccion;
    public $telefono;
    public $correo;
    protected $rules = [
        'nombre' => 'required|string',
        'direccion' => 'required|string',
        'telefono' => 'required|integer',
        'correo' => 'required|string|email',

    ];
    public function render()
    {
        return view('livewire.clientes.create');
    }

    public function submit(){
        $this->validate();

        // Execution doesn't reach here if validation fails.
  /*  $cliente=new Cliente();
    $cliente->nombre=$this->nombre;
    $cliente->direccion=$this->direccion;
    $cliente->telefono=$this->telefono;
    $cliente->correo=$this->correo;
    $cliente->save();*/
        Cliente::create([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
        ]);
        $this->redirect('clientes');

    }
}
