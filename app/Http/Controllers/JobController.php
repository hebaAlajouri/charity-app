<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index() {
    $jobs = Job::where('is_active', true)->latest()->paginate(6);
    return view('careers.index', compact('jobs'));
}

public function show(Job $job) {
    return view('careers.show', compact('job'));
}

// للمدير:
public function create() { return view('admin.jobs.create'); }
public function store(Request $r) { /* validate + create job ... */ }
public function edit(Job $job) { return view('admin.jobs.edit', compact('job')); }
public function update(Request $r, Job $job){ /* update */ }
public function destroy(Job $job){ $job->delete(); }
public function apply($id)
{
    $job = Job::findOrFail($id);
    $hrEmail = 'hr@example.com'; // You can change this or fetch from settings

    return view('careers.apply', compact('job', 'hrEmail'));
}

}
