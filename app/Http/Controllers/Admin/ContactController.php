<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    // Display all contacts
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    // Show form to create a new contact
    public function create()
    {
        return view('admin.contact.create');
    }

    // Store a new contact
    public function store(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'status' => 'nullable|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        // Create the contact
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status ?? 'Inactive', // default to Inactive
        ]);

        return redirect()->route('admin.contact.index')
                         ->with('success', 'Contact created successfully.');
    }

    // Show a specific contact
    // Show form to edit a contact
    public function edit(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }
    // Update a contact
    public function update(Request $request, Contact $contact)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'status' => 'nullable|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        // Update the contact
        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status ?? 'Inactive', // default to Inactive
        ]);

        return redirect()->route('admin.contact.index')
                         ->with('success', 'Contact updated successfully.');
    }

    // Delete a contact
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index')
                         ->with('success', 'Contact deleted successfully.');
    }
}
