<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    // Display all services
    public function index()
    {
        $services = Services::all();
        return view('admin.services.index', compact('services'));
    }

    // Show create form
    public function create()
    {
        return view('admin.services.create');
    }

    // Store new service
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $service = Services::create([
            'title' => $validated['title'],
            'name' => $validated['name'] ?? null,
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'],
            'icon' => null, // will assign if uploaded
        ]);

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('icons', 'public');
            $service->icon = $path;
            $service->save();
        }

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $service = Services::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    // Update existing service
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $service = Services::findOrFail($id);
        $service->title = $request->input('title')?? null;
        $service->name = $request->input('name') ?? null;
        $service->description = $request->input('description') ?? null;
        $service->status = $request->input('status');

        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($service->icon) {
                Storage::disk('public')->delete($service->icon);
            }
            $path = $request->file('icon')->store('icons', 'public');
            $service->icon = $path;
        }

        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    // Delete service
    public function destroy($id)
    {
        $service = Services::findOrFail($id);

        if ($service->icon) {
            Storage::disk('public')->delete($service->icon);
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
