<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('published_at', 'desc')->get();
        return view('admin.reports.index', compact('reports'));
    }

    public function create()
    {
        return view('admin.reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
    'title' => 'required|string|max:255',
    'title_en' => 'nullable|string|max:255',
    'category' => 'nullable|string|max:255',
    'category_en' => 'nullable|string|max:255',
    'description' => 'nullable|string',
    'description_en' => 'nullable|string',
    'file_path' => 'nullable|file|mimes:pdf,doc,docx',
    'published_at' => 'nullable|date',
]);

$data = $request->only([
    'title', 'title_en',
    'category', 'category_en',
    'description', 'description_en',
    'published_at'
]);

if ($request->hasFile('file_path')) {
    $path = $request->file('file_path')->store('reports', 'public');
    $data['file_path'] = $path;
}

Report::create($data);

        return redirect()->route('admin.reports.index')->with('success', 'تم إضافة التقرير بنجاح');
    }

    public function edit(Report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
       $request->validate([
    'title' => 'required|string|max:255',
    'title_en' => 'nullable|string|max:255',
    'category' => 'nullable|string|max:255',
    'category_en' => 'nullable|string|max:255',
    'description' => 'nullable|string',
    'description_en' => 'nullable|string',
    'file_path' => 'nullable|file|mimes:pdf,doc,docx',
    'published_at' => 'nullable|date',
]);

$data = $request->only([
    'title', 'title_en',
    'category', 'category_en',
    'description', 'description_en',
    'published_at'
]);

if ($request->hasFile('file_path')) {
    if ($report->file_path) {
        Storage::disk('public')->delete($report->file_path);
    }
    $data['file_path'] = $request->file('file_path')->store('reports', 'public');
}

$report->update($data);


        return redirect()->route('admin.reports.index')->with('success', 'تم تحديث التقرير بنجاح');
    }

    public function destroy(Report $report)
    {
        if ($report->file_path) {
            Storage::disk('public')->delete($report->file_path);
        }
        $report->delete();

        return redirect()->route('admin.reports.index')->with('success', 'تم حذف التقرير بنجاح');
    }
}
