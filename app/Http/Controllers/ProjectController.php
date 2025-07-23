<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        $locale = app()->getLocale(); // 'en' or 'ar'

        // Select localized fields only
       $projects = Project::select([
    'id',
    "name_{$locale} as name",
    $locale === 'ar' ? 'description as description' : 'description_en as description',
    'image',
    'icon',
    'goal_amount',
    'raised_amount',
    'code',
])->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        $locale = app()->getLocale(); // 'en' or 'ar'

        // Create a dynamic version of the project
        $localizedProject = (object)[
            'id' => $project->id,
            'name' => $project->{"name_{$locale}"},
            'description' => $project->{"description_{$locale}"},
            'image' => $project->image,
            'icon' => $project->icon,
            'goal_amount' => $project->goal_amount,
            'raised_amount' => $project->raised_amount,
            'code' => $project->code,
        ];

        return view('projects.show', ['project' => $localizedProject]);
    }
}
