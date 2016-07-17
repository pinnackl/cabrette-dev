<?php

namespace App\Http\Controllers;

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

    public function getMediaVideo()
    {
        $medias = Media::where('type', 'video')->get();

        return  view('medias.video.index', compact('medias'));
    }

    public function getMediaMusic()
    {
        $medias = Media::where('type', 'music')->get();

        return  view('medias.music.index', compact('medias'));
    }

    public function getMediaPartition()
    {
        $medias = Media::where('type', 'partition')->get();

        return  view('medias.partition.index', compact('medias'));
    }
}
