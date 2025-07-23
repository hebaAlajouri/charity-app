<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orphan;
use App\Models\Donation;
use App\Models\Project;

class AdminController extends Controller
{
public function index()
{
    // Get orphans status counts (available, sponsored)
    $orphansStatus = \App\Models\Orphan::selectRaw("status, COUNT(*) as total")
        ->groupBy("status")
        ->pluck("total", "status");

    if ($orphansStatus->isEmpty()) {
        $orphansStatus = collect(['available' => 0, 'sponsored' => 0]);
    }

    // Get donations count by status (pending, success)
    $donationsByStatus = \App\Models\Donation::selectRaw("status, COUNT(*) as total")
        ->groupBy("status")
        ->pluck("total", "status");

    if ($donationsByStatus->isEmpty()) {
        $donationsByStatus = collect(['pending' => 0, 'success' => 0]);
    }

    // Get donation amounts by Arabic project name
    $donationAmounts = \App\Models\Donation::selectRaw("projects.name_ar as project, SUM(donations.amount) as total")
        ->join('projects', 'donations.project_id', '=', 'projects.id')
        ->groupBy('projects.name_ar')
        ->pluck("total", "project");

    if ($donationAmounts->isEmpty()) {
        $donationAmounts = collect(['لا توجد مشاريع' => 0]);
    }

    return view('admin.dashboard', compact('orphansStatus', 'donationsByStatus', 'donationAmounts'));
}


}