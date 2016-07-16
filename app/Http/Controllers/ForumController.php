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

        $posts = Post::where('title', '!=', 'cabrette')->where('title', '!=', 'association')->orderBy('created_at', 'esc')->get();

        return view('forum.index', compact('themes', 'posts'));
    }

    public function create()
    {
        $announce = new Post;
        $types = ['video' => 'Video' , 'music' => 'Music',  'partition' => 'Partitions'];

        return view('admin.forum.edit', compact('announce', 'types'));
    }

    public function show($id)
    {
        $theme = Theme::findOrFail($id);

        return view('forum.show', compact('theme'));
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
