<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Auth,Input, Request;

class CalendarController extends BaseController {

    public function index()
    {
        $eventsUser = Event::all();

        return response()->json(compact('eventsUser'));
    }


}
