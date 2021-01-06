<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    public $searchName='';
    public $type='';
    public $paginator=5;

    public $userName='...';
    public $user;
    use WithPagination;

    public function render()
    {
        $users = User::where('name','like','%'.$this->searchName.'%')
            ->where('type','like','%'.$this->type.'%')
             ->paginate($this->paginator);

        return view('livewire.users',compact('users'))
            ->layout('layouts.app');
    }
    public function user($user)
    {
        $this->user = $user;
    return view('livewire.user.delete',compact('user'));
    }
}
