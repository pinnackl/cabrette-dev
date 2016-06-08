<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Theme;
use Input, Auth;

class ThemeController extends BaseController
{
    public function index()
    {
        $themes = Theme::all();

        return view('admin.theme.index', compact('themes'));
    }

    public function create()
    {
        $theme = new Theme();

        return view('admin.theme.edit', compact('theme', 'types'));
    }

    public function store()
    {
        $theme = new Theme(Input::all());
        $theme->save();

        return redirect(route('admin.themes.index'));
    }

    public function edit($id)
    {
        $theme = Theme::findOrFail($id);

        return view('admin.theme.edit', compact('theme'));
    }

    public function update($id)
    {
        $theme = Theme::findOrFail($id);

        $theme->fill(Input::all());

        $theme->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }

    public function destroy($id)
    {
        $theme = Theme::findOrFail($id);
        $theme->delete();

        return redirect(route('admin.themes.index'));
    }
}
