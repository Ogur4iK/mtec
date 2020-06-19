<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'login.required' => 'Логин является обязательным полем',
            'login.unique' => 'Логин должен быть уникальным',
            'name.required' => 'ФИО является обязательным полем',
            'password.required' => 'Пароль является обязательным полем',
            'password.min' => 'Минимальная длина пароля 6 символов',
        ];
        Validator::make($request->all(), [
            'login' =>'required|unique:users',
            'name'   =>  'required',
            'password' =>  'required|min:6'
        ], $messages)->validate();

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        $user->toggleAdmin($request->get('role'));
        return redirect()->route('users.index')->with('status', 'Запись успешно добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $messages = [
            'login.required' => 'Логин является обязательным полем',
            'login.unique' => 'Логин должен быть уникальным',
            'name.required' => 'ФИО является обязательным полем',
            'password.min' => 'Минимальная длина пароля 6 символов',
        ];
        Validator::make($request->all(), [
            'login' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'name'   =>  'required',
            'password' =>  'min:6'
        ], $messages)->validate();

        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->toggleAdmin($request->get('role'));
        return redirect()->route('users.index')->with('status', 'Запись успешно отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('status', 'Запись успешно удалена');
    }
}
