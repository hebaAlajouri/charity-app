<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminJobController extends Controller
{
    public function index()
{
    $jobs = Job::orderBy('created_at', 'desc')->get();
    return view('admin.jobs.index', compact('jobs'));
}


    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:دوام كامل,دوام جزئي,متطوع',
            'deadline' => 'nullable|date',
            'is_active' => 'required|boolean',
        ]);

        Job::create($request->all());

        return redirect()->route('admin.jobs.index')->with('success', 'تم إضافة الوظيفة بنجاح');
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:دوام كامل,دوام جزئي,متطوع',
            'deadline' => 'nullable|date',
            'is_active' => 'required|boolean',
        ]);

        $job->update($request->all());

        return redirect()->route('admin.jobs.index')->with('success', 'تم تحديث الوظيفة بنجاح');
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'تم حذف الوظيفة بنجاح');
    }
    
}
