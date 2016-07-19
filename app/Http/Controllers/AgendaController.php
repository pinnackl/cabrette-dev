<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\BaseController;
use Input, Auth;

class AgendaController extends BaseController
{
    public function index()
    {
        $events = Event::all();

        return view('agenda.index', compact('events'));
    }

}
