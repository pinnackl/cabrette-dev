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

    public function store()
    {
        $announce = new Announce(Input::all());
        $announce->save();

        return redirect(route('admin.announces.index'));
    }

    public function edit($id)
    {
        $announce = Announce::findOrFail($id);

        return view('admin.announce.edit', compact('announce'));
    }

    public function update($id)
    {
        $announce = Announce::findOrFail($id);

        $announce->fill(Input::all());

        $announce->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }

    public function destroy($id)
    {
        $announce = Announce::findOrFail($id);
        $announce->delete();

        return redirect(route('admin.announces.index'));
    }
}
