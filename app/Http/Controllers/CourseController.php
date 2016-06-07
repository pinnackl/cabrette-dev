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
        $courses = Course::paginate(20);

        return view('course.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);

        return view('course.show', compact('course'));
    }
}
