<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FooterContentController extends Controller
{
    // Display all footer contents
    public function index()
    {
        $footercontents = FooterContent::all();
        return view('admin.footercontents.index', compact('footercontents'));
    }

    // Show form to create a new footer content
    public function create()
    {
        return view('admin.footercontents.create');
    }

    // Store a new footer content
    public function store(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        // Handle file upload
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('footer', 'public');
        }

        // Create new record
        FooterContent::create([
            'logo' => $logoPath,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status ?? 'Inactive',
        ]);

        return redirect()->route('admin.contact.index')
            ->with('success', 'Footer content created successfully.');
    }

    // Show form to edit a footer content
    

    // Update a footer content
    public function update(Request $request, $id)
    {
        // Validate form data
        $request -> validate( [
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'status' => 'nullable|in:Active,Inactive',
        ]);
        $footercontent = FooterContent::findOrFail($id);


     

        // Update logo if a new one is uploaded
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('footer', 'public');
        } else {
            $logoPath = $footercontent->logo;
        }

        // Update record
        $footercontent->update([
            'logo' => $logoPath,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status ?? 'Inactive',
        ]);

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Footer content updated successfully.');
    }

    // Delete a footer content
    public function destroy($id)
    {
        $footercontent = FooterContent::findOrFail($id);
        $footercontent->delete();
    
        return redirect()->route('admin.contact.index')
            ->with('success', 'Footer content deleted successfully.');
    }
    
}
