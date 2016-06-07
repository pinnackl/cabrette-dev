<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Announce;
use App\Models\Media;
use Input, Auth;

class AnnounceController extends BaseController
{
    public function index()
    {
        $announces = Announce::paginate(20);

        return view('admin.announce.index', compact('announces'));
    }

    public function create()
    {
        $announce = new Announce;
        $types = ['video' => 'Video' , 'music' => 'Music',  'partition' => 'Partitions'];

        return view('admin.announce.edit', compact('announce', 'types'));
    }
}
