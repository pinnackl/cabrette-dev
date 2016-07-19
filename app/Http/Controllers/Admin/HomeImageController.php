<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Image;
use Input, Auth;

class HomeImageController extends BaseController
{
    public function index()
    {
        $images = Image::paginate(20);

        return view('admin.image.index', compact('images'));
    }

    public function create()
    {
        $image = new Image;
        $nbImages = count(Image::all());

        return view('admin.image.edit', compact('image', 'nbImages'));
    }

    public function store()
    {
        $image = new Image(Input::all());

        if(Input::file()) {
            if (Input::file('image_filename')) {
                $imgCoverFile = Input::file('image_filename');
                UploadFileHelper::moveToDestinationAndSaveInModel($imgCoverFile, $image, 'image_filename');
            }
        }

        $image->save();

        return redirect(route('admin.images.index'));
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        $nbImages = count(Image::all());

        return view('admin.image.edit', compact('image', 'nbImages'));
    }

    public function update($id)
    {
        $image = Image::findOrFail($id);

        $image->fill(Input::all());

        if(Input::file()) {
            if (Input::file('image_filename')) {
                $imgCoverFile = Input::file('image_filename');
                UploadFileHelper::moveToDestinationAndSaveInModel($imgCoverFile, $image, 'image_filename');
            }
        }

        $image->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return redirect(route('admin.images.index'));
    }
}
