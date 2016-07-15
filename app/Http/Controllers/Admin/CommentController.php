<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Comment;
use Input, Auth;

class CommentController extends BaseController
{
    public function index()
    {
        $comments = Comment::paginate(20);

        return view('admin.comment.index', compact('comments'));
    }

    public function update($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->fill(Input::all());
        $comment->save();

        return redirect()->back()->with('success', 'Commentaire signalé');
    }

    public function destroy($id)
    {

    }

}
