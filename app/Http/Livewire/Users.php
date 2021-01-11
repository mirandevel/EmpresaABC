<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $searchName='';
    public $type='';
    public $paginator=1;

    public $currentName;
    public $currentId;
    public $currentUser;

    public $name;
    public $showDelete;
    public $showUpdate;
    public $showMore;
    protected $listeners = [
        'modalDelete' => 'modalDelete',
        'modalUpdate' => 'modalUpdate',
        'modalMore' => 'modalMore',
        'habilitar' => 'habilitar'
    ];
    public function render()
    {

        $users = User::where('type','like','%'.$this->type.'%')
             ->where('name','like','%'.$this->searchName.'%')
             ->paginate($this->paginator);
        return view('livewire.users',['users'=>$users])
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
    public function modalDelete(User $user){
        $this->currentId=$user->id;
        $this->currentName=$user->name;
        $this->showDelete=true;
    }
    public function modalUpdate(User $user){
        $this->currentId=$user->id;
        $this->currentName=$user->name;
        $this->currentUser=$user;
        $this->showUpdate=true;
    }
    public function modalMore(User $user){
        $this->currentId=$user->id;
        $this->currentName=$user->name;
        $this->currentUser=$user;
        $this->showMore=true;

    }
    public function deleteUser()
    {
        if (strtolower($this->currentName) == strtolower($this->name)) {
            User::destroy($this->currentId);
            $this->redirect(route('users'));
        }
    }
    public function habilitar()
    {
        $this->currentUser->active=!$this->currentUser->active;
        $this->currentUser->save();
        $this->redirect(route('users'));
    }


}
