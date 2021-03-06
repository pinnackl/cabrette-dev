<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
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

        if (Input::has('modif_password')) {
            if ((Input::get('new_password') == Input::get('confirm_new_password'))) {
                $user->password = Input::get('confirm_new_password');
            } else {
                return redirect()->back()->withErrors('Les deux mots de passes ne sont pas identiques');
            }
        }

        $user->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }
}
