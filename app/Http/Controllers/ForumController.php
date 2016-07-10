<?php

namespace App\Http\Controllers;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Announce;
use App\Models\Media;
use App\Models\Post;
use App\Models\Theme;
use Input, Auth;

class ForumController extends BaseController
{
    public function index()
    {
        $themes = Theme::all();

        return view('forum.index', compact('themes'));
    }

    public function create()
    {
        $announce = new Post;
        $types = ['video' => 'Video' , 'music' => 'Music',  'partition' => 'Partitions'];

        return view('admin.forum.edit', compact('announce', 'types'));
    }

    public function store()
    {
        $announce = new Post(Input::all());
        $announce->save();

        return redirect(route('admin.forums.index'));
    }

    public function edit($id)
    {
        $announce = Post::findOrFail($id);

        return view('admin.forum.edit', compact('announce'));
    }

    public function update($id)
    {
        $announce = Post::findOrFail($id);

        $announce->fill(Input::all());

        $announce->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }

    public function destroy($id)
    {
        $announce = Post::findOrFail($id);
        $announce->delete();

        return redirect(route('admin.forums.index'));
    }
}
