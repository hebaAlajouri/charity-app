<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    public function index()
    {
        \App\Models\Message::where('is_read', false)->update(['is_read' => true]);
        $messages = Message::latest()->get();
        return view('admin.messages.index', compact('messages'));
    }

  public function show(Message $message)
{
    if (!$message->is_read) {
        $message->is_read = true;
        $message->save();
    }

    return view('admin.messages.show', compact('message'));
}


    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'تم حذف الرسالة بنجاح');
    }
}
