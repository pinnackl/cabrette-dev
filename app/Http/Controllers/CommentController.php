<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Comment;
use Input, Auth;

class CommentController extends BaseController
{
    public function store()
    {
        $comment = New Comment(Input::all());
        $comment->author = Auth::id();
        $comment->state = true;
        $comment->save();

        return redirect()->back()->with('success', 'Commentaire bien enregistré');
    }

    public function update($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->fill(Input::all());
        $comment->save();

        return redirect()->back()->with('success', 'Commentaire signalé');
    }

}
