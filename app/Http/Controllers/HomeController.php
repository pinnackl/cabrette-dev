<?php namespace App\Http\Controllers;

use App\Models\Post;
use Input, Request;

class HomeController extends BaseController
{
    public function index()
    {
        return view('home.index');
    }
}