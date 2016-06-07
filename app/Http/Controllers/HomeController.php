<?php namespace App\Http\Controllers;

use App\Models\Announce;
use App\Models\Course;
use App\Models\Post;
use Input, Request;

class HomeController extends BaseController
{
    public function index()
    {
        $courses = Course::all();
        $announces = Announce::all();

        $subjects = Post::where('title', '!=', 'association')->where('title', '!=', 'cabrette')->get();

        return view('home.index', compact('courses', 'announces', 'subjects'));
    }
}
