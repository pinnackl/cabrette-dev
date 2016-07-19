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

    public function show($link_url)
    {
        $post = Post::where('link_url', $link_url)->first();

        return view('forum.subject.show', compact('post'));
    }

}
