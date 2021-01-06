<?php

namespace App\Http\Livewire\User;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;

class Create extends Component
{
    use PasswordValidationRules;

    public $ci;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $direction;
    public $type='t';
    public $password_confirmation;

    /*protected $rules = [
        'ci' => 'required|integer|between:1000000,99999999',
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed',
        'phone' => 'required|integer|between:10000000,99999999',
        'direction' => 'required|string|max:255',
        'type' => 'required|string|max:1',
    ];

    public function updated($propertyName)
    {
        //$this->validateOnly($propertyName);
    }*/
    public function render()
    {
        return view('livewire.user.create')->layout('layouts.guest');
    }
    public function saveUser(){
        //$this->validate();
        $input=array('ci'=>$this->ci,'name'=>$this->name,'email'=>$this->email,'password'=>$this->password,
            'password_confirmation'=>$this->password_confirmation,'phone'=>$this->phone,'direction'=>$this->direction,'type'=>$this->type);
        Validator::make($input, [
            'ci' => ['required', 'integer','between:1000000,99999999'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'phone' => ['required', 'integer','between:10000000,99999999'],
            'direction' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:1'],
        ])->validate();
        DB::transaction(function () use ($input) {
            return User::create([
                'ci' => $input['ci'],
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'phone' => $input['phone'],
                'direction' => $input['direction'],
                'active' => true,
                'type' => $input['type'],
            ]);
        });
        $this->redirect(route('users'));

    }
}
