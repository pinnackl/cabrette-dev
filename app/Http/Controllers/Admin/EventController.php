<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Event;
use App\Models\Post;
use Input, Auth;

class EventController extends BaseController
{
    public function index()
    {
        $events = Event::paginate(20);

        return view('admin.event.index', compact('events'));
    }
}
