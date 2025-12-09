<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'project_idea' => 'required|string',
            'features' => 'nullable|string',
            'budget' => 'nullable|string|max:100',
            'timeline' => 'nullable|string|max:100',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,txt,jpg,jpeg,png|max:5120', // 5MB max
        ]);

        // Handle file upload
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $attachmentPath = $file->storeAs('contact_attachments', $filename, 'public');
        }

        // Store message in database
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'project_idea' => $request->project_idea,
            'features' => $request->features,
            'budget' => $request->budget,
            'timeline' => $request->timeline,
            'attachment' => $attachmentPath,
        ]);

        // Redirect back with success message
        return redirect()->route('pages.contact')->with('success', 'Your message has been sent successfully! We will get back to you soon.');
    }

}