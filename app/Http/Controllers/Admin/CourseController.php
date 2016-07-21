<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFileHelper;
use App\Http\Controllers\BaseController;
use App\Models\Course;
use Input, Auth;

class CourseController extends BaseController
{
    public function index()
    {
        $courses = Course::paginate(20);

        return view('admin.course.index', compact('courses'));
    }

    public function create()
    {
        $course = new Course();
        $types = ['video' => 'Video' , 'music' => 'Music',  'partition' => 'Partitions'];

        return view('admin.course.edit', compact('course', 'types'));
    }

    public function store()
    {
        $course = new Course(Input::all());
        $course->save();

        return redirect(route('admin.courses.index'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        return view('admin.course.edit', compact('course'));
    }

    public function update($id)
    {
        $course = Course::findOrFail($id);

        $course->fill(Input::all());

        $course->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect(route('admin.courses.index'));
    }
}
