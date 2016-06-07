<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Media;
use Input, Auth;

class MediaController extends BaseController
{
    public function index()
    {
        $medias = Media::paginate(20);

        return view('admin.media.index', compact('medias'));
    }

    public function create()
    {
        $media = new Media;
        $types = ['video' => 'Video' , 'music' => 'Music',  'partition' => 'Partitions'];

        return view('admin.media.edit', compact('media', 'types'));
    }
}
