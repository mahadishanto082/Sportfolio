<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Packages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PackageController extends Controller
{
    public function index()
    {
        $packages = Packages::all(); // fetch all packages
    return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function edit($id)
    {
        $packages = Packages::findOrFail($id); // safer than find()
        return view('admin.packages.edit', compact('packages'));
    }
    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'duration' => 'nullable|string|max:255',
            'features' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $validated = $validator->validated();
        $package = new Packages();
        $package->title = $validated['title'] ?? null;
        $package->name = $validated['name'] ?? null;
        $package->price = $validated['price'] ?? null;
        $package->duration = $validated['duration'] ?? null;
        $package->features = $validated['features'] ?? null;
        $package->status = $validated['status'];
        $package->save();
        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'duration' => 'nullable|string|max:255',
            'features' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $validated = $validator->validated();
        $package = Packages::find($id);
        if (!$package) {
            return redirect()->back()->with('error', 'Package not found.');
        }
        $package->title = $validated['title'] ?? null;
        $package->name = $validated['name'] ?? null;
        $package->price = $validated['price'] ?? null;
        $package->duration = $validated['duration'] ?? null;
        $package->features = $validated['features'] ?? null;
        $package->status = $validated['status'];
        $package->save();
        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = Packages::find($id);
        if (!$package) {
            return redirect()->back()->with('error', 'Package not found.');
        }
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }
}
