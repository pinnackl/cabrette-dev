<?php

namespace App\Models;

use Exception;
use Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Jenssegers\Mongodb\Eloquent\Builder;

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;


    protected $attributes = [
        'role' => 'user'
    ];

    protected $fillable = ['email', 'first_name', 'last_name', 'phone', 'role'];

    protected $validationRules = [
        'role'  => 'required|in:admin,user,coach',
        'email' => 'required|email|unique:users,email,:self:,_id',
    ];

    public function posts() { return $this->hasMany('App\Models\Post'); }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

}
