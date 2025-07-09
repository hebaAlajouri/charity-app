<?php



namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Project;
use App\Models\sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    // Step 1: Show donor info form (skip if logged in)
    public function confirmDonation(Project $project)
    {
        $user = Auth::user();
        return view('donations.confirm', compact('project', 'user'));
    }

    // Step 2: Process donor info & redirect to payment method page
    public function storeDonorInfo(Request $request, Project $project)
    {
        // Validate inputs based on authentication status
        $validated = $request->validate([
            'full_name' => Auth::check() ? 'nullable' : 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'save_info' => 'nullable|boolean',
            'message' => 'nullable|string|max:500',
            'amount' => 'required|numeric|min:1',
        ]);

        // Prepare donation data
        $donationData = [
            'project_id' => $project->id,
            'amount' => $validated['amount'],
            'message' => $validated['message'] ?? null,
            'status' => 'pending',
        ];

        if (Auth::check()) {
            $donationData['user_id'] = Auth::id();
            $donationData['full_name'] = Auth::user()->name;
            $donationData['email'] = Auth::user()->email;
        } else {
            $donationData['full_name'] = $validated['full_name'];
            $donationData['email'] = $validated['email'] ?? null;
            $donationData['phone'] = $validated['phone'] ?? null;
        }

        // Create donation with pending status
        $donation = Donation::create($donationData);

        // Redirect to payment step
        return redirect()->route('donations.payment', ['project' => $project->id, 'donation' => $donation->id]);
    }

    // Step 3: Show payment method page
    public function payment(Project $project, Donation $donation)
    {
        return view('donations.payment', compact('project', 'donation'));
    }

    // Step 4: Process payment (mock)
   public function processPayment(Project $project, Donation $donation, Request $request)
{
    $request->validate([
        'payment_type' => 'required|string|in:visa,paypal,efawateercom,apple_pay,google_pay',
    ]);

    // Update donation details
    $donation->payment_type = $request->payment_type;
    $donation->status = 'success'; // or keep 'pending' if payment is still to be verified
    $donation->save();

    // Update raised amount in the related project
    if ($donation->project_id) {
        $project->raised_amount += $donation->amount;
        $project->save();
    }

    return redirect()->route('donations.thankYou', $donation);


}


    // Step 5: Thank you page
    public function thankYou(Donation $donation)
    {
        return view('donations.thankyou', compact('donation'));
    }
}
