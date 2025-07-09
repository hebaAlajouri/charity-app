<?php


namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Sponsorship;

use App\Models\Donation;
use App\Models\Orphan;

class HomeController extends Controller
{
  public function showLandingPage()
{
    $projects = Project::all();

    $sponsoredChildren = Sponsorship::where('status', 'active')->count();

    $completedProjects = Project::whereColumn('raised_amount', '>=', 'goal_amount')->count();

    $activeDonors = Donation::where('status', 'success')
        ->distinct('user_id')
        ->count('user_id');

    $provinces = Orphan::selectRaw("COUNT(DISTINCT SUBSTRING_INDEX(address, '-', 1)) as count")
        ->value('count');

    return view('welcome', compact(
        'projects',
        'sponsoredChildren',
        'completedProjects',
        'activeDonors',
        'provinces'
    ));
}
}

