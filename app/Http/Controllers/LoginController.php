<?php

namespace App\Http\Controllers;

use Auth;
use Exception;
use Input;
use Session;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login.index');
    }

    public function store()
    {
        if (!Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])) {
            return back()->withInput()->with('error', 'Connexion impossible avec ces identifiants.');
        }

        if (Auth::user()->isAdmin()) {
            return redirect()->intended(route('admin.users.index'));
        }

        return redirect()->intended('');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('login');
    }
}
