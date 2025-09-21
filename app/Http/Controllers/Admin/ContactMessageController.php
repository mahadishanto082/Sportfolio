<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    // Display list of messages with search & pagination
    public function index(Request $request)
    {
        $query = ContactMessage::query()->orderBy('created_at', 'DESC');

        if ($request->filled('key')) {
            $key = $request->key;
            $query->where(function ($q) use ($key) {
                $q->where('name', 'like', "%{$key}%")
                  ->orWhere('email', 'like', "%{$key}%")
                  ->orWhere('mobile', 'like', "%{$key}%");
            });
        }

        $messages = $query->paginate(15)->withQueryString(); // maintain search in pagination
        return view('admin.messages.index', compact('messages'));
    }

    // Show single message
   
    // Delete a message
    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
