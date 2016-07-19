<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Event;
use App\Models\Post;
use Carbon\Carbon;
use Input, Auth;

class EventController extends BaseController
{
    public function index()
    {
        $events = Event::all();

        return view('admin.event.index', compact('events'));
    }

    public function store()
    {
        $event = new Event(Input::all());
        $event->date_start = new Carbon(Input::get('date_start'));
        if (!Input::get('date_end')) {
            $event->date_end = new Carbon(Input::get('date_start'));
        } else {
            $event->date_end = new Carbon(Input::get('date_end'));
        }

        if(Input::file()) {

            if (Input::file('cover_event')) {
                $imgCoverFile = Input::file('cover_event');
                UploadFileHelper::moveToDestinationAndSaveInModel($imgCoverFile, $event, 'cover_event');
            }
        }
        $event->user_id = Auth::id();
        $event->save();

        return redirect()->back()->with('success', 'Evènement bien créé');
    }

    public function all()
    {
        $eventsUser = Event::where('start', '>=', new Carbon(Input::get('start'), 'UTC'))->where('end', '<=', new Carbon(Input::get('end'), 'UTC'))->get();

        $eventsUser = Event::all();

        return response()->json(compact('eventsUser'));
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->back()->with('success', 'Evènement bien supprimé');
    }
}
