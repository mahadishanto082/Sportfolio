<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeaderContent;

class HeaderContentController extends Controller
{

    public function index()
    {
        $headerContents = HeaderContent::all(); // Collection
        return view('admin.headercontent.index', compact('headerContents'));
    }
    
    public function create()
    {
        $headerContent = HeaderContent::first();
        return view('admin.headercontent.create', compact('headerContent'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:Active,Inactive',
            'button_names' => 'required|array',
            'button_links' => 'required|array',
        ]);

        $headerContent = new HeaderContent();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('logos', $filename, 'public'); 
            $headerContent->logo = $path; 
        }
        

        $headerContent->status = $request->status;

        // Save buttons as JSON
        $buttons = [];
        foreach ($request->button_names as $index => $name) {
            $link = $request->button_links[$index] ?? '#';
            $buttons[] = [
                'name' => $name,
                'link' => $link,
            ];
        }
        $headerContent->buttons = json_encode($buttons);

        $headerContent->save();

        return redirect()->back()->with('success', 'Header content saved successfully!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:Active,Inactive',
            'button_names' => 'required|array',
            'button_links' => 'required|array',
        ]);

        $headerContent = HeaderContent::findOrFail($id);

        // // Handle logo upload
        // if ($request->hasFile('logo')) {
        //     $file = $request->file('logo');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $file->storeAs('public/logos', $filename);
            
        // }
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        

        $headerContent->status = $request->status;

        // Save buttons as JSON
        $buttons = [];
        foreach ($request->button_names as $index => $name) {
            $link = $request->button_links[$index] ?? '#';
            $buttons[] = [
                'name' => $name,
                'link' => $link,
            ];
        }
        $headerContent->buttons = json_encode($buttons);

        $headerContent->save();

        return redirect()->back()->with('success', 'Header content updated successfully!');
    }
    public function destroy($id)
    {
        $headerContent = HeaderContent::findOrFail($id);
        $headerContent->delete();

        return redirect()->back()->with('success', 'Header content deleted successfully!');
    }
}