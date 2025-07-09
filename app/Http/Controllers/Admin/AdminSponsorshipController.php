<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use App\Models\User;
use App\Models\Orphan;
use Illuminate\Http\Request;

class AdminSponsorshipController extends Controller
{
    public function index()
    {
        $sponsorships = Sponsorship::with(['sponsor', 'orphan'])->get();
        return view('admin.sponsorships.index', compact('sponsorships'));
    }

    public function create()
    {
        $sponsors = User::where('role', 'user')->get();
        $orphans = Orphan::where('status', 'available')->get();
        return view('admin.sponsorships.create', compact('sponsors', 'orphans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sponsor_id' => 'required|exists:users,id',
            'orphan_id' => 'required|exists:orphans,id',
            'sponsorship_type' => 'nullable|string',
            'start_date' => 'nullable|date',
            'sponsored_for' => 'nullable|string',
            'number_of_orphans' => 'nullable|integer|min:1',
            'status' => 'required|in:active,ended',
        ]);

        Sponsorship::create($request->all());

        return redirect()->route('admin.sponsorships.index')->with('success', 'تمت إضافة الكفالة بنجاح');
    }

    public function edit(Sponsorship $sponsorship)
    {
        $sponsors = User::where('role', 'user')->get();
        $orphans = Orphan::all();
        return view('admin.sponsorships.edit', compact('sponsorship', 'sponsors', 'orphans'));
    }

    public function update(Request $request, Sponsorship $sponsorship)
    {
        $request->validate([
            'sponsor_id' => 'required|exists:users,id',
            'orphan_id' => 'required|exists:orphans,id',
            'sponsorship_type' => 'nullable|string',
            'start_date' => 'nullable|date',
            'sponsored_for' => 'nullable|string',
            'number_of_orphans' => 'nullable|integer|min:1',
            'status' => 'required|in:active,ended',
        ]);

        $sponsorship->update($request->all());

        return redirect()->route('admin.sponsorships.index')->with('success', 'تم تحديث الكفالة بنجاح');
    }

    public function destroy(Sponsorship $sponsorship)
    {
        $sponsorship->delete();
        return redirect()->route('admin.sponsorships.index')->with('success', 'تم حذف الكفالة بنجاح');
    }
}
