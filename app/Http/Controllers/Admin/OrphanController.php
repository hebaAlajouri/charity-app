<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orphan;
use Illuminate\Http\Request;

class OrphanController extends Controller
{
    public function index()
    {
        $orphans = Orphan::all();
        return view('admin.orphans.index', compact('orphans'));
    }

    public function create()
    {
        return view('admin.orphans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'guardian_phone' => 'nullable|string',
            'address' => 'nullable|string',
            'age' => 'nullable|integer',
            'status' => 'required|in:available,sponsored',
        ]);

        Orphan::create($request->all());

        return redirect()->route('admin.orphans.index')->with('success', 'تمت إضافة اليتيم بنجاح');
    }

    public function edit(Orphan $orphan)
    {
        return view('admin.orphans.edit', compact('orphan'));
    }

    public function update(Request $request, Orphan $orphan)
    {
        $request->validate([
            'name' => 'required',
            'guardian_phone' => 'nullable|string',
            'address' => 'nullable|string',
            'age' => 'nullable|integer',
            'status' => 'required|in:available,sponsored',
        ]);

        $orphan->update($request->all());

        return redirect()->route('admin.orphans.index')->with('success', 'تم تحديث بيانات اليتيم');
    }

    public function destroy(Orphan $orphan)
    {
        $orphan->delete();
        return redirect()->route('admin.orphans.index')->with('success', 'تم حذف اليتيم');
    }
}
