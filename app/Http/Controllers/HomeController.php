<?php namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Announce;
use App\Models\Course;
use App\Models\Image;
use App\Models\Post;
use Carbon\Carbon;
use Input, Request;

class HomeController extends BaseController
{
    public function index()
    {
        $courses = Course::all();
        $announces = Announce::all();
        $images = Image::all();

        $subjects = Post::where('title', '!=', 'association')->where('title', '!=', 'cabrette')->get();

        $event =  Event::where('date_start', '>=', Carbon::now())->first();

        return view('home.index', compact('courses', 'announces', 'subjects', 'event', 'images'));
    }
}
