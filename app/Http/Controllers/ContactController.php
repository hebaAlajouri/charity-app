<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function storeMessage(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create($validated);

        return back()->with('success', 'تم إرسال رسالتك بنجاح!');
    }
}
