<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Exception;
use Input;
use Session;

class LoginUserController extends BaseController
{
    public function index()
    {
        return view('login.user.index');
    }

    public function signup()
    {
        return view('login.user.signup');
    }

    public function store()
    {
        $user = new User(Input::all());

        if(Input::get('confirm_password') != Input::get('password'))
        {
            return redirect()->back()->with('error', 'Les deux mots de passes ne sont pas identiques');
        }
        $user->role = 'user';
        $user->password = Input::get('password');
        $user->save();

        Auth::login($user);

        return redirect(route('/'));
    }
}
