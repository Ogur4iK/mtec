<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $messages = [
            'login.required' => 'Логин является обязательным полем',
            'password.required' => 'Пароль является обязательным полем'
        ];
        Validator::make($request->all(), [
            'login'	=>	'required',
            'password'	=>	'required'
        ], $messages)->validate();

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
