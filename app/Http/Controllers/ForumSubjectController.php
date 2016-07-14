<?php

namespace App\Http\Controllers;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Post;
use App\Models\Theme;
use Input, Auth;

class ForumSubjectController extends BaseController
{

    public function show($theme_id, $subject_id)
    {
        $theme = Theme::findOrFail($theme_id);
        $post = Post::findOrFail($subject_id);

        return view('forum.subject.show', compact('theme', 'post'));
    }

    public function update($id)
    {
        $announce = Post::findOrFail($id);

        $announce->fill(Input::all());

        $announce->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }
}
