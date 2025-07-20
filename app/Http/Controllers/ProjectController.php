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
          $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
  public function show(Project $project)
{
    return view('projects.show', compact('project'));
}
 
}