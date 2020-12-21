<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guestLogin() 
    {
        $email = 'ipod.c@softbank.ne.jp';
        $password = 'guestpass';
        
        if(\Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/');
        }
        
        return redirect('/');
    }
}
