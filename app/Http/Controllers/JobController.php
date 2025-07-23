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
public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'title_en' => 'nullable|string|max:255',
        'location' => 'nullable|string|max:255',
        'location_en' => 'nullable|string|max:255',
        'description' => 'required|string',
        'description_en' => 'nullable|string',
        'type' => 'required|in:دوام كامل,دوام جزئي,متطوع',
        'deadline' => 'nullable|date',
        'is_active' => 'sometimes|boolean',
    ]);

    $job = Job::create([
        'title' => $validatedData['title'],
        'title_en' => $validatedData['title_en'] ?? null,
        'location' => $validatedData['location'] ?? null,
        'location_en' => $validatedData['location_en'] ?? null,
        'description' => $validatedData['description'],
        'description_en' => $validatedData['description_en'] ?? null,
        'type' => $validatedData['type'],
        'deadline' => $validatedData['deadline'] ?? null,
        'is_active' => $validatedData['is_active'] ?? true,
    ]);

    return redirect()->route('admin.jobs.index')->with('success', 'Job created successfully.');
}
public function apply($id)
{
    $job = Job::findOrFail($id);
    $hrEmail = 'hr@example.com'; // You can change this or fetch from settings

    return view('careers.apply', compact('job', 'hrEmail'));
}
}
