<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrphanApplication;
use Illuminate\Http\Request;

class AdminOrphanApplicationController extends Controller
{
    public function index()
    {
        $applications = OrphanApplication::latest()->paginate(10);
        return view('admin.orphan_applications.index', compact('applications'));
    }

    public function show(OrphanApplication $orphan_application)
    {
        return view('admin.orphan_applications.show', compact('orphan_application'));
    }

    public function edit(OrphanApplication $orphan_application)
    {
        return view('admin.orphan_applications.edit', compact('orphan_application'));
    }

    public function update(Request $request, OrphanApplication $orphan_application)
    {
        $request->validate([
            'status' => 'required|in:pending,under_review,approved,rejected',
            'admin_notes' => 'nullable|string',
        ]);

        $orphan_application->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        return redirect()->route('admin.orphan_applications.index')->with('success', 'تم تحديث الطلب بنجاح');
    }

    public function destroy(OrphanApplication $orphan_application)
    {
        $orphan_application->delete();
        return back()->with('success', 'تم حذف الطلب بنجاح');
    }
    public function create()
{
    return view('admin.orphan_applications.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'guardian_name' => 'required|string|max:255',
        'guardian_phone' => 'required|string|max:20',
        'guardian_id_number' => 'required|string|max:50|unique:orphan_applications',
        'guardian_relationship' => 'required|string',
        'guardian_address' => 'required|string',
        'guardian_city' => 'required|string',
        'orphan_name' => 'required|string',
        'orphan_birth_date' => 'required|date',
        'orphan_gender' => 'required|in:ذكر,أنثى',
        'orphan_address' => 'required|string',
        'orphan_city' => 'required|string',
        'father_name' => 'required|string',
        'father_death_date' => 'required|date',
        'father_death_cause' => 'required|string',
        'father_id_number' => 'required|string|unique:orphan_applications',
        'monthly_income' => 'required|numeric',
        'family_members_count' => 'required|integer',
        'financial_situation_description' => 'required|string',
        'housing_type' => 'required|string',
        'housing_description' => 'required|string',
        'education_level' => 'required|string',
        'support_needed' => 'required|string',
    ]);

    OrphanApplication::create($validated);

    return redirect()->route('admin.orphan_applications.index')->with('success', 'تم إنشاء الطلب بنجاح');
}

}
