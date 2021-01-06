<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Cliente;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Clientes extends Component
{

    public $searchName='';
    public $paginator=5;

    public $userName='...';
    public $user;
    use WithPagination;

    public function render()
    {
        $clientes = Cliente::where('nombre','like','%'.$this->searchName.'%')
            ->paginate($this->paginator);

        return view('livewire.clientes.clientes',compact('clientes'))
            ->layout('layouts.app');
    }

}
