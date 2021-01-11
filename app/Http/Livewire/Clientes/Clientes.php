<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Cliente;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Clientes extends Component
{
    use WithPagination;

    public $searchName='';
    public $paginator=5;

    public $currentName;
    public $currentId;
    public $currentClient;

    public $name;
    public $showDelete;
    public $showUpdate;
    public $showMore;
    protected $listeners = [
        'modalDelete' => 'modalDelete',
        'modalUpdate' => 'modalUpdate',
        'modalMore' => 'modalMore',
    ];
    public function render()
    {
        $clientes = Cliente::where('nombre','like','%'.$this->searchName.'%')
            ->paginate($this->paginator);

        return view('livewire.clientes.clientes',compact('clientes'))
            ->layout('layouts.app');
    }
    public function updated($propertyName)
    {
        if($propertyName=='showDelete'){
            $this->name='';
        }
        if($propertyName=='searchName'){
            $this->resetPage();
        }
    }

    public function modalDelete(Cliente $client){
        $this->currentId=$client->id;
        $this->currentName=$client->nombre;
        $this->showDelete=true;
    }
    public function modalUpdate(Cliente $client){
        $this->currentId=$client->id;
        $this->currentName=$client->nombre;
        $this->currentClient=$client;
        $this->showUpdate=true;
    }
    public function modalMore(Cliente $client){
        $this->currentId=$client->id;
        $this->currentName=$client->nombre;
        $this->currentClient=$client;
        $this->showMore=true;

    }
    public function deleteClient()
    {
        if (strtolower($this->currentName) == strtolower($this->name)) {
            Cliente::destroy($this->currentId);
            $this->redirect(route('clientes'));
        }
    }
}
