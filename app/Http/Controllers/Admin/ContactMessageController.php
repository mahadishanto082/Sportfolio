<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ContactMessageController extends Controller
{
    /**
     * Display a listing of contact messages with search & pagination
     */
    public function index(Request $request)
    {
        $query = ContactMessage::query()->orderBy('created_at', 'DESC');

        // Search by name, email, or project idea
        if ($request->filled('key')) {
            $key = $request->key;
            $query->where(function ($q) use ($key) {
                $q->where('name', 'like', "%{$key}%")
                  ->orWhere('email', 'like', "%{$key}%")
                  ->orWhere('project_idea', 'like', "%{$key}%");
            });
        }

        $messages = $query->paginate(15)->withQueryString(); // maintain search in pagination
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display a single contact message
     */
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Delete a contact message
     */
    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);

        // Delete attachment if exists
        if ($message->attachment) {
                        Storage::disk('public')->delete($message->attachment);
        }

        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
