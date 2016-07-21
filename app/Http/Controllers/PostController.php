<?php

namespace App\Http\Controllers;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Post;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Input, Auth;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::where('author', Auth::id())->get();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $post = new Post;
        $themes =  Theme::all()->lists('title', 'id');

        return view('post.edit', compact('post', 'themes'));
    }

    public function store()
    {
        $post = new Post(Input::all());
        $post->author = Auth::id();

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

        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $user ) {
            Mail::send('emails.postsubmit', ['user' => $user], function ($m) use ($user) {
                $m->to($user->email)->subject('Un post à été écrit par un utilisateur');
            });
        }

        return redirect(route('posts.index'))->with('success', 'Article crée');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $themes =  Theme::all()->lists('title', 'id');

        return view('post.edit', compact('post', 'themes'));
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

        return redirect(route('posts.index'));
    }
}
