<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Module;
use Auth;
use Session;

class ModuleActivityController extends BaseController
{
    public function show($moduleId, $activityId)
    {
        $module = Module::findOrFail($moduleId);
        $activity = Activity::findOrFail($activityId);
        $courseProgress = Auth::user()->getCurrentCourseProgress();

        $courseProgress->addProgression($moduleId, $activityId);
        $courseProgress->save();

        $progression = $module->findProgressionFor($activity);

        return view('module.activity.show', compact('module', 'activity', 'progression'));
    }
}