<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class More extends Component
{
    public $cliente;
    public function mount($id){
       $this->cliente=Cliente::find($id);
       $this->cliente->load('tasks');
    }
    public function render()
    {
        return view('livewire.clientes.more')->layout('layouts.app',['header'=>'Más detalles del cliente']);
    }
}
