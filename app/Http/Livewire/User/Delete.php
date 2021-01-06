<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Delete extends Component
{
    public $userName='delete';
    public $user;

    protected $listeners=[
      'updateUser'=> 'updateUser',
    ];
    public function mount($user){
        $this->user=$user;
    }
    public function render()
    {
        return view('livewire.user.delete');
    }
    public function deleteUser(){
        $this->redirect(route('users'));
    }
}
