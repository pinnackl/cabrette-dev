<?php

namespace App\Http\Controllers;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Course;
use Input, Auth;

class CourseController extends BaseController
{
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->get();

        return view('course.index', compact('courses'));
    }

    public function show($link_url)
    {
        $course = Course::where('link_url', $link_url)->first();

        return view('course.show', compact('course'));
    }
}
