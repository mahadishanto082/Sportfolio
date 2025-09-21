<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TitlePage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TitlePageController extends Controller
{
    public function index()
    {
        $titlePages = TitlePage::all();
        return view('admin.titlepage.index', compact('titlePages'));
    }

    public function create()
    {
        return view('admin.titlepage.create');
    }
    


    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bg_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            'short_title' => 'nullable|string|max:255',
            'content' => 'required|string',
            'caption' => 'nullable|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('title_pages', ['disk' => 'public']);
        }

        if ($request->hasFile('bg_image')) {
            $validated['bg_image'] = $request->file('bg_image')->store('title_pages', ['disk' => 'public']);
        }

        TitlePage::create([
            'image' => $validated['image'] ?? null,
            'bg_image' => $validated['bg_image'] ?? null,
            
            'short_title' => $validated['short_title'],
            'content' => $validated['content'],
            'caption' => $validated['caption'] ?? null,
            'status' => $validated['status'],
        ]);


        return redirect()->route('admin.title-page.index')->with('success', 'Title Page created successfully.');
    }
    public function edit($id)
    {
        $titlePage = TitlePage::findOrFail($id);
        return view('admin.titlepage.edit', compact('titlePage'));
    }
    public function update(Request $request, $id)
    {
        $titlePage = TitlePage::findOrFail($id);

        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bg_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            'short_title' => 'nullable|string|max:255',
            'content' => 'required|string',
            'caption' => 'nullable|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($request->hasFile('image')) {
            if ($titlePage->image) {
                Storage::disk('public')->delete($titlePage->image);
            }
            $validated['image'] = $request->file('image')->store('title_pages', ['disk' => 'public']);
        }

        if ($request->hasFile('bg_image')) {
            if ($titlePage->bg_image) {
                Storage::disk('public')->delete($titlePage->bg_image);
            }
            $validated['bg_image'] = $request->file('bg_image')->store('title_pages', ['disk' => 'public']);
        }

        $titlePage->update([
            'image' => $validated['image'] ?? $titlePage->image,
            'bg_image' => $validated['bg_image'] ?? $titlePage->bg_image,
            
            'short_title' => $validated['short_title'],
            'content' => $validated['content'],
            'caption' => $validated['caption'] ?? null,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.title-page.index')->with('success', 'Title Page updated successfully.');
    }
    public function destroy($id)
    {
        $titlePage = TitlePage::findOrFail($id);
        
        if ($titlePage->image) {
            Storage::disk('public')->delete($titlePage->image);
        }
        
        if ($titlePage->bg_image) {
            Storage::disk('public')->delete($titlePage->bg_image);
        }

        $titlePage->delete();

        return redirect()->route('admin.title-page.index')->with('success', 'Title Page deleted successfully.');
    }
}