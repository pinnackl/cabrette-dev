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

    public function store()
    {
        $media = new Media(Input::all());
        $media->save();

        return redirect(route('admin.medias.index'));
    }

    public function edit($id)
    {
        $media = Media::findOrFail($id);

        return view('admin.media.edit', compact('course'));
    }

    public function update($id)
    {
        $media = Media::findOrFail($id);

        $media->fill(Input::all());

        $media->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();

        return redirect(route('admin.medias.index'));
    }
}
