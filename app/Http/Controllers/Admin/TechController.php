<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechController extends Controller
{
    public function index()
    {
        $techs = Tech::all();
        return view('admin.tech.index', compact('techs'));
    }

    public function create()
    {
        return view('admin.tech.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo_image' => 'required|image|max:2048',
            'status' => 'required|in:Active,Inactive',
        ]);
    
        // make sure we always replace logo_image with stored path
        if ($request->hasFile('logo_image')) {
            $data['logo_image'] = $request->file('logo_image')->store('tech', 'public');
        }
    
        Tech::create($data);
    
        return redirect()->route('admin.tech.index')->with('success', 'Technology added successfully.');
    }
    
    public function edit(Tech $tech)
    {
        return view('admin.tech.edit', compact('tech'));
    }

    public function update(Request $request, Tech $tech)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo_image' => 'nullable|image|max:2048', // fixed: nullable, not required
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($request->hasFile('logo_image')) {
            // delete old logo
            if ($tech->logo_image) {
                Storage::disk('public')->delete($tech->logo_image);
            }
            $data['logo_image'] = $request->file('logo_image')->store('tech', 'public');
        }

        $tech->update($data);

        return redirect()->route('admin.tech.index')->with('success', 'Technology updated successfully.');
    }

    public function destroy(Tech $tech)
    {
        if ($tech->logo_image) {
            Storage::disk('public')->delete($tech->logo_image);
        }
        $tech->delete();

        return redirect()->route('admin.tech.index')->with('success', 'Technology deleted successfully.');
    }
}
