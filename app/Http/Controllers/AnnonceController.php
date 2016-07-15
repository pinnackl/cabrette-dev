<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Announce;
use App\Models\Category;
use Input, Auth;

class AnnonceController extends BaseController
{
    public function index()
    {
        $announces = Announce::where('author', Auth::id())->get();

        return view('my-announce.index', compact('announces'));
    }

    public function create()
    {
        $announce = new Announce;
        $types = ['video' => 'Video' , 'music' => 'Music',  'partition' => 'Partitions'];
        $categories =  Category::all()->lists('title', 'id');

        return view('my-announce.edit', compact('announce', 'types', 'categories'));
    }


    public function store()
    {
        $announce = new Announce(Input::all());
        $announce->author = Auth::id();
        if(Input::get('categories')) {
            $announce->category_id = Input::get('categories');
        }
        $announce->save();

        return redirect(route('annonces.index'));
    }

    public function edit($id)
    {
        $announce = Announce::findOrFail($id);
        $categories =  Category::all()->lists('title', 'id');

        return view('my-announce.edit', compact('announce', 'categories'));
    }

    public function update($id)
    {
        $announce = Announce::findOrFail($id);

        $announce->fill(Input::all());
        if(Input::get('categories')) {
            $announce->category_id = Input::get('categories');
        }

        $announce->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }

    public function destroy($id)
    {
        $announce = Announce::findOrFail($id);
        $announce->delete();

        return redirect(route('annonces.index'));
    }
}
