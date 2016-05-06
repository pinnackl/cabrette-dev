<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Auth;

class ModuleController extends BaseController
{
    public function index()
    {
        $course = Auth::user()->getCurrentCourseProgress()->course;
        $themes = $course->themes;

        return view('module.index', compact('course', 'themes'));
    }

    public function show($id)
    {
        $courseProgress = Auth::user()->getCurrentCourseProgress();
        $activity = $courseProgress->getLastActivity(Module::findOrFail($id));

        if ($activity === null) {
            return 'Ce module n\'a pas encore d\'activité.';
        }

        return redirect(route('modules.activities.show', [$id, $activity->id]));
    }
}