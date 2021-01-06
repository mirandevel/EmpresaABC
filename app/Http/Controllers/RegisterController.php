<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'ci' => ['required', 'integer','between:1000000,99999999'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'phone' => ['required', 'integer','between:10000000,99999999'],
            'direction' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:1'],
        ])->validate();

        return DB::transaction(function () use ($input) {
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
    }
}
