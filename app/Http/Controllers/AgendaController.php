<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Announce;
use Input, Auth;

class AgendaController extends BaseController
{
    public function index()
    {
        return view('agenda.index');
    }

}
