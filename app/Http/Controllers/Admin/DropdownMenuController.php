<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dropdown;

class DropdownMenuController extends Controller
{
    public function index()
    {
        // Retrieve only active dropdowns if needed
        $dropdowns = Dropdown::orderBy('id', 'desc')->get();

        return view('admin.headercontent.ddindex', compact('dropdowns'));
    }

    public function create()
    {
        return view('admin.headercontent.ddcreate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dropdown_button_name' => 'required|string|max:255',
            'category_id'         => 'required|string|max:255', // Ensure category exists
            'dropdown_items'       => 'required|array|min:1',
            'dropdown_items.*'     => 'required|string|max:255',
            'status'               => 'required|in:Active,Inactive',
        ]);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public'); // Store image if provided
        } else {
            $validated['image'] = null; // Set to null if no image is provided
        }

        // Ensure we store multiple items together in one row
        Dropdown::create([
            'dropdown_button_name' => $validated['dropdown_button_name'],

            'category_id'         => $validated['category_id'],
            'dropdown_items'       => json_encode(array_values($validated['dropdown_items'])),
            'status'               => $validated['status'],
        ]);

        return redirect()
            ->route('admin.dropdown.index')
            ->with('success', 'Dropdown created successfully.');
    }
    
    public function destroy($id)
    {
        $dropdown = Dropdown::findOrFail($id);
        $dropdown->delete();

        return redirect()
            ->route('admin.dropdown.index')
            ->with('success', 'Dropdown deleted successfully.');
    }
    public function headerDropdowns()
    {
        $dropdowns = DB::table('dropdown_infos')
            ->where('status', 'Active')
            ->orderBy('dropdown_button_name')
            ->get()
            ->groupBy('dropdown_button_name');
    
        return view('layouts.header', compact('dropdowns'));
    }
    

}