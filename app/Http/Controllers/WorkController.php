<?php namespace App\Http\Controllers;

use App\Models\Post;
use Input, Request;

class WorkController extends BaseController
{
    public function index()
    {
        
        return view('work.index');
    }
}