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
        // Get orphans status with proper error handling
        $orphansStatus = Orphan::selectRaw("status, COUNT(*) as total")
            ->groupBy("status")
            ->pluck("total", "status");
        
        // If no orphans exist, create empty collection
        if ($orphansStatus->isEmpty()) {
            $orphansStatus = collect(['نشط' => 0, 'غير نشط' => 0]);
        }

        // Get donations by status with proper error handling
        $donationsByStatus = Donation::selectRaw("status, COUNT(*) as total")
            ->groupBy("status")
            ->pluck("total", "status");
        
        // If no donations exist, create empty collection
        if ($donationsByStatus->isEmpty()) {
            $donationsByStatus = collect(['مكتمل' => 0, 'معلق' => 0]);
        }

        // Get donation amounts by project with proper error handling
        $donationAmounts = Donation::selectRaw("projects.name as project, SUM(donations.amount) as total")
            ->join('projects', 'donations.project_id', '=', 'projects.id')
            ->groupBy('projects.name')
            ->pluck("total", "project");
        
        // If no donations exist, create empty collection
        if ($donationAmounts->isEmpty()) {
            $donationAmounts = collect(['لا توجد مشاريع' => 0]);
        }

        return view('admin.dashboard', compact('orphansStatus', 'donationsByStatus', 'donationAmounts'));
    }
}