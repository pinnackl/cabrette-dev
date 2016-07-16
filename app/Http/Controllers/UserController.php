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

        if (Input::get('modif_password') && (Input::get('new_password') == Input::get('confirm_new_password'))) {
            $user->password = Input::get('confirm_new_password');
        } else {
            return redirect()->back()->withErrors('Les deux mots de passes ne sont pas identiques');
        }

        $user->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }
}
