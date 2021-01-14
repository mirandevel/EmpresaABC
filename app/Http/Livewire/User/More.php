<?php

namespace App\Http\Livewire\User;

use App\Models\Asistencia;
use App\Models\Tarea;
use App\Models\User;
use Livewire\Component;

class More extends Component
{
    public $user;
    public $tareas;
    public $asistencias;
    public $tab;
    protected $listeners=[
      'tab'=>'showTab'
    ];
    public function mount($id){
       $this->user=User::find($id);
       if ($this->user->type!='a'){
           $this->tareas=Tarea::where('tec_id',$this->user->id)->get();
       }else{
           $this->tareas=Tarea::where('adm_id',$this->user->id)->get();
       }

       $this->asistencias=Asistencia::where('tec_id',$this->user->id)->get();

    }
    public function render()
    {
        return view('livewire.user.more')->layout('layouts.app',['header'=>'Más detalles del usuario']);
    }
    public function showTab($number){
        $this->tab=$number;
    }
}
