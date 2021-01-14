<?php

namespace App\Http\Livewire;

use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Livewire\Component;

class Report extends Component
{
    public $users;
    protected $listeners=[
        'download'=>'download'
    ];
    public function render()
    {
        $this->users=User::all();
        return view('livewire.report')->layout('layouts.guest');

    }
    public function download(){
        $pdf=PDF::loadView('all-users');
        return $pdf->download('users.pdf');
    }

}
