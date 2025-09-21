<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    // Display all portfolios
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(15);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    // Show create form
    public function create()
    {
        return view('admin.portfolio.create');
    }

    // Store new portfolio
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'project_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'caption'=> 'nullable|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $validated = $validator->validated();
    
        $portfolio = new Portfolio();
        $portfolio->title = $validated['title']?? null;
        $portfolio->sub_title = $validated['sub_title'] ?? null;
        $portfolio->description = $validated['description'] ?? null;
        $portfolio->caption = $validated['caption'] ?? null;
        $portfolio->project_name = $validated['project_name'] ?? null;
        $portfolio->status = $validated['status'];
    
        // Correct image handling
        if ($request->hasFile('logo_image')) {
            $portfolio->logo_image = $request->file('logo_image')->store('portfolio', 'public');
        }
    
        $portfolio->save();
    
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio created successfully.');
    }
    
    // Show edit form
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }
    // Update existing portfolio
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'project_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'caption'=> 'nullable|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        // Find portfolio entry
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->title = $validated['title']?? null;
        $portfolio->sub_title = $validated['sub_title'] ?? null;
        $portfolio->description = $validated['description'] ?? null;
        $portfolio->caption = $validated['caption'] ?? null;
        $portfolio->project_name = $validated['project_name'] ?? null;
        $portfolio->logo_image = null; // will assign if uploaded
        
        $portfolio->status = $validated['status'];

        if ($request->hasFile('logo_image')) {
            $portfolio->logo_image = $request->file('logo_image')->store('portfolio', 'public');
        }
        
        $portfolio->save();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio updated successfully.');
    }
    // Delete portfolio
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio deleted successfully.');
    }
}
