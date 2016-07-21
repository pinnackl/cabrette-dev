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
        $courses = Course::orderBy('created_at', 'desc')->take(5)->get();
        $announces = Announce::orderBy('created_at', 'desc')->take(5)->get();
        $images = Image::all();

        Carbon::setLocale('fr');

        $subjects = Post::where('title', '!=', 'association')->where('title', '!=', 'cabrette')->where('title', '!=', 'newsletter')->where('state', '1')->orderBy('created_at', 'desc')->take(5)->get();

        $event = Event::where('date_start', '>=', Carbon::now())->where('date_start', '<=', Carbon::now()->addDay(4))->first();


        return view('home.index', compact('courses', 'announces', 'subjects', 'event', 'images'));
    }
}
