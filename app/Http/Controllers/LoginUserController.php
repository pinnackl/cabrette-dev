<?php

namespace App\Http\Controllers;

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
}
