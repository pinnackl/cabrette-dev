<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Post;
use Input, Auth;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::paginate(20);

        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $post = new Post;
        $types = ['pub' => 'pub' , 'clip' => 'clip', 'exp' => 'experimental', 'habillage' => 'habillage'];

        return view('admin.post.edit', compact('post', 'types'));
    }

    public function store()
    {
        $post = new Post(Input::all());
        $post->author = Auth::id();

        if(Input::file()) {

            if (Input::file('cover')) {
                $imgCoverFile = Input::file('cover');
                UploadFileHelper::moveToDestinationAndSaveInModelCover($imgCoverFile, $post, 'cover_filename');
            }
        }

        $post->save();

        return redirect(route('admin.posts.index'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $types = ['pub' => 'pub' , 'clip' => 'clip', 'exp' => 'experimental', 'habillage' => 'habillage'];

        return view('admin.post.edit', compact('post', 'types'));
    }

    public function update($id)
    {
        $post = Post::findOrFail($id);

        $post->fill(Input::all());
        
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

        return redirect(route('admin.posts.index'));
    }
}
