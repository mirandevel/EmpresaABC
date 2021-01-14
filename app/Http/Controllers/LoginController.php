<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnArgument;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // Retrive Input
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request['email'])->first();
        if ($user == null) {
            return 'nulo';
        } else {
            if ($user->type == 'a'){
                if (Auth::attempt($credentials)) {
                    // if success login
                   // Auth::logout();

                    return redirect('tasks');

                    //return redirect()->intended('/details');
                }
            }
            return view('no-adm');
        }
        // if failed login
        return redirect('login');
    }
}
