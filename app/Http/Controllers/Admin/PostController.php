<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Post;
use App\Models\Theme;
use Input, Auth;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::where('title', '!=', 'cabrette')->where('title', '!=', 'association')->get();

        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $post = new Post;
        $themes =  Theme::all()->lists('title', 'id');

        return view('admin.post.edit', compact('post', 'types', 'themes'));
    }

    public function store()
    {
        $post = new Post(Input::all());
        $post->author = Auth::id();

        $exitstLinkUlr = Post::where('link_url',Input::get('link_url') )->get();

        if(count($exitstLinkUlr) > 0) {
            return redirect()->back()->withErrors('Lien déja utilisé');
        }

        if(Input::get('type_theme') == 1 && Input::get('theme')) {
            $post->theme_id = Input::get('theme');
        }

        if(Input::file()) {

            if (Input::file('cover')) {
                $imgCoverFile = Input::file('cover');
                UploadFileHelper::moveToDestinationAndSaveInModelCover($imgCoverFile, $post, 'cover_filename');
            }
        }

        $post->save();

        return redirect(route('admin.forums.index'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $themes =  Theme::all()->lists('title', 'id');

        return view('admin.post.edit', compact('post', 'types', 'themes'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.post.edit', compact('post'));
    }

    public function update($id)
    {
        $post = Post::findOrFail($id);

        $post->fill(Input::all());

        if(Input::get('type_theme') == 1 && Input::get('theme')) {
            $post->theme_id = Input::get('theme');
        }

        if(Input::file()) {
            if (Input::file('cover')) {
                $imgCoverFile = Input::file('cover');
                UploadFileHelper::moveToDestinationAndSaveInModelCover($imgCoverFile, $post, 'cover_filename');
            }
        }

        $post->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect(route('admin.forums.index'));
    }
}
