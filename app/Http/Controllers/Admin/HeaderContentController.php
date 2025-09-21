<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeaderContent;
use App\Models\Dropdown;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HeaderContentController extends Controller
{
    public function index()
    {
        $headercontents = HeaderContent::paginate(10);
        return view('admin.headercontent.index', compact('headercontents'));
    }

    public function create()
    {
        return view('admin.headercontent.create');
    }

    public function edit($id)
    {
        $headercontent = HeaderContent::findOrFail($id);
        return view('admin.headercontent.edit', compact('headercontent'));
    }

    public function show()
    {
       
        return view('admin.headercontent.dropdown');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
            'button_name' => 'nullable|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only([ 'button_name', 'status']);
        $data['emergency_contact'] = $data['button_name'] ?? null;
        unset($data['button_name']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // PHP array directly stored, Laravel handles via $casts
        HeaderContent::updateOrCreate([], $data);

        return redirect()->route('admin.header-content.index')
                         ->with('success', 'Header content updated successfully.');
    }

    public function update(Request $request, HeaderContent $headerContent)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
            'button_name' => 'nullable|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only([ 'button_name', 'status']);
        $data['emergency_contact'] = $data['button_name'] ?? null;
        unset($data['button_name']);

        if ($request->hasFile('logo')) {
            if ($headerContent->logo) {
                Storage::disk('public')->delete($headerContent->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $headerContent->update($data);

        return redirect()->route('admin.header-content.index')
                         ->with('success', 'Header content updated successfully.');
    }

    public function destroy(HeaderContent $headerContent)
    {
        if ($headerContent->logo) {
            Storage::disk('public')->delete($headerContent->logo);
        }
        $headerContent->delete();

        return redirect()->route('admin.header-content.index')
                         ->with('success', 'Header content deleted successfully.');
    }


        
}
