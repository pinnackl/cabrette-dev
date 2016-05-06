<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Input;

class UserController extends BaseController
{
    public function index()
    {
        $users = User::paginate(20);

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $user = new User;

        return view('admin.user.create', compact('user'));
    }

    public function store()
    {
        $user = new User(Input::all());
        $user->password = Input::get('password');
        $user->save();

        return redirect(route('admin.users.index'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    public function update($id)
    {
        $user = User::findOrFail($id);

        $user->fill(Input::all());

        if (Input::get('password')) {
            $user->password = Input::get('password');
        }

        $user->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect(route('admin.users.index'));
    }
}
