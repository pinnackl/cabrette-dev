<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Announce;
use App\Models\Media;
use App\Models\Post;
use Input, Auth;

class PageController extends BaseController
{
    public function association()
    {
        $post = Post::where('title', 'association')->first();

        return view('admin.page.association', compact('post'));
    }

    public function cabrette()
    {
        $post = Post::where('title', 'cabrette')->first();

        return view('admin.page.cabrette', compact('post'));
    }
}
