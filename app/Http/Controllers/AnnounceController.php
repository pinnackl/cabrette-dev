<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Announce;
use Input, Auth;

class AnnounceController extends BaseController
{
    public function index()
    {
        $announces = Announce::paginate(20);

        return view('announce.index', compact('announces'));
    }

    public function show($id)
    {
        $announce = Announce::findOrFail($id);

        return view('announce.show', compact('announce'));
    }
}
