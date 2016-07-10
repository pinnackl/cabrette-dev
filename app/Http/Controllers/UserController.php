<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Input, Auth;


class UserController extends BaseController
{

    public function edit()
    {
        $user = Auth::user();

        return view('user.edit', compact('user'));
    }

    public function update()
    {
        $user = Auth::user();

        $user->fill(Input::all());

        $user->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }
}
