<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Cliente;
use App\Models\User;
use Livewire\Component;

class Update extends Component
{
    public $cliente;
    protected $rules = [
        'cliente.nombre' => 'required|string',
        'cliente.direccion' => 'required|string',
        'cliente.telefono' => 'required|integer',
        'cliente.correo' => 'required|string|email',

    ];
    public function mount($id){
        $this->cliente=Cliente::find($id);
    }
    public function render()
    {
        return view('livewire.clientes.update')->layout('layouts.app',['header'=>'Actualizar Cliente']);
    }
    public function submit()
    {
        $this->validate();
        $this->cliente->save();
        $this->redirect(route('clientes'));
    }
}
