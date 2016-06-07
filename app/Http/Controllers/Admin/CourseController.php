<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Media;
use Input, Auth;

class CourseController extends BaseController
{
    public function index()
    {
        $courses = Media::paginate(20);

        return view('admin.course.index', compact('courses'));
    }

    public function create()
    {
        $course = new Media;
        $types = ['video' => 'Video' , 'music' => 'Music',  'partition' => 'Partitions'];

        return view('admin.course.edit', compact('course', 'types'));
    }
}
