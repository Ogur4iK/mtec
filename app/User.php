<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->save();
        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function generatePassword($password)
    {
        if($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function makeAdmin()
    {
        $this->role = 1;
        $this->save();
    }

    public function makeNormal()
    {
        $this->role = 0;
        $this->save();
    }

    public function toggleAdmin($value)
    {
        return $value == null ? $this->makeNormal() : $this->makeAdmin();
    }

    public function isAdmin()
    {
        return $this->role == 0 ? false : true;
    }

    public function getRole()
    {
        return $this->role == 0 ? 'Модератор' : 'Администратор';
    }

    public function getRoleStatus()
    {
        return $this->role == 0 ? '' : 'checked';
    }
}
