<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'semi_description' => 'nullable|string',
            'caption' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $about = new About();
        $about->title = $validated['title'] ?? null;
        $about->description = $validated['description'] ?? null;
        $about->semi_description = $validated['semi_description'] ?? null;
        $about->caption = $validated['caption'] ?? null;
        $about->status = $validated['status'];

        // Handle images
        if ($request->hasFile('image')) {
            $about->image = $request->file('image')->store('about', 'public');
        }
        if ($request->hasFile('logo_image')) {
            $about->logo_image = $request->file('logo_image')->store('about', 'public');
        }

        $about->save();

        return redirect()->route('admin.about.index')->with('success', 'About created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'semi_description' => 'nullable|string',
            'caption' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:Active,Inactive',
        ]);

        $about = About::first();

        $about->title = $request->input('title');
        $about->description = $request->input('description');
        $about->semi_description = $request->input('semi_description');
        $about->caption = $request->input('caption');
        $about->status = $request->input('status');

        // Handle new image upload
        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $about->image = $request->file('image')->store('about', 'public');
        }

        if ($request->hasFile('logo_image')) {
            if ($about->logo_image) {
                Storage::disk('public')->delete($about->logo_image);
            }
            $about->logo_image = $request->file('logo_image')->store('about', 'public');
        }

        $about->save();

        return redirect()->route('admin.about.index')->with('success', 'About section updated successfully.');
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);

        if ($about->image) {
            Storage::disk('public')->delete($about->image);
        }
        if ($about->logo_image) {
            Storage::disk('public')->delete($about->logo_image);
        }

        $about->delete();

        return redirect()->route('admin.about.index')->with('success', 'About section deleted successfully.');
    }
}
