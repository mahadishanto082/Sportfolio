<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DropdownInfo;
use App\Models\Dropdown;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class DropdownInfoController extends Controller
{
    public function index()
{
    $dropdowns = Dropdown::all();          // Make sure this is defined
    $dropdownInfos = DropdownInfo::all();  // Correct variable

    return view('admin.headercontent.ddinfoindex', compact('dropdowns', 'dropdownInfos'));
}


    public function create()
    {
        $dropdowns = Dropdown::all();
        return view('admin.headercontent.ddinfocreate', compact('dropdowns'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dropdown_button_name' => 'required|string|max:255',
            'category_id'         => 'nullable|string|max:255', // Ensure category exists
            'title'               => 'nullable|string|max:255',
            'content'             => 'nullable|string',
            'dropdown_items'       => 'nullable|array',
            'dropdown_items.*'     => 'nullable|string|max:255',
            'image.*'               => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image 
            'subtitle'            => 'nullable|string|max:255', // Optional subtitle validation
            'headline_image'        => 'nullable|string|max:255', // Optional healing image validation
            'caption'               => 'nullable|string|max:255', // Optional caption validation
            'description'           => 'nullable|string|max:500', // Optional description validation
            'link'                => 'nullable|url|max:255', // Optional link validation
            'status'               => 'required|in:Active,Inactive',
        ]);
        if ($request->hasFile('images')) {
            $images = $request->file('images'); // array of uploaded files
            $storedImages = [];
        
            foreach ($images as $image) {
                $storedImages[] = $image->store('images', 'public'); // store each image
            }
        
            $validated['images'] = json_encode($storedImages); // save as JSON string
        } else {
            $validated['images'] = null;
        }
        
        // Ensure we store multiple items together in one row
        Dropdowninfo::create([
            'dropdown_button_name' => $validated['dropdown_button_name'],
            'category_id'         => $validated['category_id'] ?? null, // Optional category ID
            'title'               => $validated['title']?? null, // Optional title
            'content'             => $validated['content']?? null, // Optional content
            
            'image'                => $validated['images'], // store JSON string
            'subtitle'            => $validated['subtitle'] ?? null, // Optional subtitle
           'headline_image' =>$validated['headline_image'] ?? null, // Optional healing image
            'caption'             => $validated['caption'] ?? null, // Optional caption
            'description'         => $validated['description'] ?? null, // Optional description

            'link'                => $validated['link'],
            'dropdown_items' => json_encode(array_values($validated['dropdown_items'] ?? [])),

            'status'               => $validated['status'],
        ]);

   

        return redirect()->route('admin.dropdown-info.index')
        ->with('success', 'Dropdown item created successfully.');
    }

    public function destroy($id)
    {
        $dropdownInfo = Dropdowninfo::findOrFail($id);
        $dropdownInfo->delete();

    
        return redirect()->route('admin.dropdown-info.index')
                 ->with('success', 'Dropdown item created successfully.');

    }
}
