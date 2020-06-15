<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{

    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'login'	=>	'required',
            'password'	=>	'required'
        ]);

        if(Auth::attempt([
            'login'	=>	$request->get('login'),
            'password'	=>	$request->get('password')
        ]))
        {
            return redirect('/admin');
        }

        return redirect()->back()->with('status', 'Неправильный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
