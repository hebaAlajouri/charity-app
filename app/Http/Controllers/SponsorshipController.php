<?php
namespace App\Http\Controllers;

use App\Models\Orphan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sponsorship;



class SponsorshipController extends Controller
{
    public function index()
    {
        $orphans = Orphan::where('status', 'available')->get();
        return view('sponsorship.index', compact('orphans'));
    }

   public function store(Request $request)
{
    $request->validate([
        'sponsor_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:255',
        'start_date' => 'required|date',
        'orphan_count' => 'nullable',
        'sponsorship_type' => 'nullable|string',
        'sponsoring_for' => 'nullable|string',
        'orphans' => 'required|array|min:1',
    ]);

    $sponsorId = Auth::check() ? Auth::id() : 1; // مستخدم افتراضي ID=1 إن لم يكن هناك تسجيل دخول

    foreach ($request->orphans as $orphanId) {
        // إنشاء الكفالة
        Sponsorship::create([
            'sponsor_id' => $sponsorId,
            'orphan_id' => $orphanId,
            'sponsorship_type' => $request->sponsorship_type,
            'start_date' => $request->start_date,
            'sponsored_for' => $request->sponsoring_for,
            'number_of_orphans' => count($request->orphans),
            'status' => 'active',
        ]);

        // تحديث حالة اليتيم إلى "مكفول"
        $orphan = Orphan::find($orphanId);
        if ($orphan) {
            $orphan->status = 'sponsored'; // أو أي كلمة تستخدمها للدلالة على "مكفول"
            $orphan->save();
        }
    }

    return back()->with('success', 'تم إرسال نموذج الكفالة بنجاح!');
}

}
