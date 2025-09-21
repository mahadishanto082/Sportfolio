<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\MainPageService;
use App\Models\AboutMain;
use App\Models\ServicesMain;
use App\Models\PortfolioMain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MainPageController extends Controller
{
    protected $mainPageService;

    public function __construct(MainPageService $mainPageService)
    {
        $this->mainPageService = $mainPageService;
    }

    public function index()
    {
        $services = $this->mainPageService->getServices();
        $about = $this->mainPageService->getAbout();
        $portfolio = $this->mainPageService->getPortfolio();
    
        $mainPages = [
            'about' => AboutMain::first(), 
            'services' => ServicesMain::first(),
            'portfolio' => PortfolioMain::first(),
        ];
        
        return view('admin.mainpages.index', compact('mainPages'));
    }
    
    public function create()
    {
        if('services' == request()->get('type')) {
            return view('admin.mainpages.services.create');
        } elseif ('about' == request()->get('type')) {
            return view('admin.mainpages.about.create');
        } elseif ('portfolio' == request()->get('type')) {
            return view('admin.mainpages.portfolio.create');
        }
    }
    public function store(Request $request)
    {
        if('services' == $request->get('type')) {
            // Handle services creation logic
        } elseif ('about' == $request->get('type')) {
            // Handle about creation logic
        } elseif ('portfolio' == $request->get('type')) {
            // Handle portfolio creation logic
        }
        if ('about' == $request->get('type')) {
            $validator = Validator::make($request->all(), [
                'title' => 'nullable|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'semi_description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'caption' => 'nullable|string|max:255',
                'history' => 'nullable|string',
                'vision' => 'nullable|string',
                'mission' => 'nullable|string',
                'achievements' => 'nullable|string',
                'status' => 'required|in:active,inactive',
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        
            $data = $request->only([
                'title', 'subtitle', 'description', 'semi_description',
                'caption', 'history', 'vision', 'mission', 'status'
            ]);
        
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('about', 'public');
            }
        
            if ($request->hasFile('logo_image')) {
                $data['logo_image'] = $request->file('logo_image')->store('about', 'public');
            }
        
            if ($request->filled('achievements')) {
                $achievements = preg_split('/\r\n|[\r\n,]+/', $request->achievements);
                $achievements = array_filter(array_map('trim', $achievements));
                $data['achievements'] = $achievements;
            }
        
            AboutMain::create($data);
        
            return redirect()->route('admin.main-page.index')->with('success', 'About content created successfully.');
        }



        // Services Store
        
        elseif ('services' == $request->get('type')) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',

                'description' => 'required|string',
                'content' => 'nullable|string',
                'features' => 'nullable|string',

                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'required|in:active,inactive',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = $request->only([
                'title', 'subtitle', 'description', 'content',
                'features', 'image',  'status'
            ]);
           
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('services', 'public');
            }
            if ($request->filled('features')) {
                $features = preg_split('/\r\n|[\r\n,]+/', $request->features);
                $data['features'] = json_encode(array_filter(array_map('trim', $features)));
            }
            // Assuming you have a ServicesMain model to handle main services content
            ServicesMain::create($data);
            return redirect()->route('admin.main-page.index')->with('success', 'Services content created successfully.');

            

            // Store the services content logic here
        }


        // Portfolio Store
        elseif ('portfolio' == $request->get('type')) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'client' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:255',
                'description' => 'required|string',
                'technologies' => 'nullable|string',
                'project_url' => 'nullable|url|max:500',
                'github_url' => 'nullable|url|max:500',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'tags' => 'nullable|string',
                'status' => 'required|in:active,inactive',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            // Collect form data
            $data = $request->only([
                'title', 'client', 'category', 'description', 'technologies',
                'project_url','github_url','status'
            ]);
            
            $data['tags'] = $request->filled('tags')
                ? array_values(array_filter(array_map('trim', preg_split('/\r\n|[\r\n,]+/', $request->tags))))
                : [];
            
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('portfolio', 'public');
            }
            
            $galleryPaths = [];
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $image) {
                    $galleryPaths[] = $image->store('portfolio/gallery', 'public');
                }
            }
            $data['gallery'] = $galleryPaths;
            
            PortfolioMain::create($data);
            
            return redirect()->route('admin.main-page.index')->with('success', 'Portfolio content created successfully.');
             }
            }
        
    public function edit($id)
    {
        $service = new MainPageService();

        if (request()->get('type') === 'about') {
            $about = $service->getAbout();  // fetch the About record
            return view('admin.mainpages.about.edit', compact('about'));
        }
    
        if (request()->get('type') === 'services') {
            $services = $service->getServices(); // fetch exact record
            return view('admin.mainpages.services.edit', compact('services'));
        }
        
    
        if (request()->get('type') === 'portfolio') {
            $portfolio = $service->getPortfolio();
            return view('admin.mainpages.portfolio.edit',compact('portfolio'));

            
            // return view for portfolio
        }
    }
    public function update(Request $request, $id)
    {
        if('services' == $request->get('type')) {

            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'description' => 'required|string',
                'content' => 'nullable|string',
                'features' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'required|in:active,inactive',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = [
                'title' => $request->input('title') ?? null,
                'subtitle' => $request->input('subtitle') ?? null,
                'description' => $request->input('description') ?? null,
                'content' => $request->input('content') ?? null,
                'features' => $request->input('features') ?? null,
                
                'status' => $request->input('status') ?? 'inactive',
            ];
            if ($request->filled('features')) {
                $features = preg_split('/\r\n|[\r\n]+/', $request->features);
                $features = array_filter(array_map('trim', $features));
                $data['features'] = json_encode($features);
            }
    
            // Handle image upload
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('services', 'public');
            }
    
            // Update the service record
            $this->mainPageService->updateServices($id, $data);
    
            return redirect()->route('admin.main-page.index')->with('success', 'Service updated successfully.');



            // Handle services update logic

        } 
        // About Update
        elseif ('about' == $request->get('type')) {
            $validator = Validator::make($request->all(), [
                'title' => 'nullable|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'semi_description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'caption' => 'nullable|string|max:255',
                'history' => 'nullable|string',
                'vision' => 'nullable|string',
                'mission' => 'nullable|string',
                'achievements' => 'nullable|string',
                'status' => 'required|in:active,inactive',
            ]);
            
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        
           $validated = $validator->validated();
           $data = [
            'title' => $request->input('title')?? null,
            'subtitle' => $request->input('subtitle')?? null,
            'description' => $request->input('description')?? null,
            'semi_description' => $request->input('semi_description')?? null,
            'caption' => $request->input('caption')?? null,
            'history' => $request->input('history')?? null,
            'vision' => $request->input('vision')?? null,
            'mission' => $request->input('mission')?? null,
            'achievements' => $request->input('achievements')?? null,
            'status' => $request->input('status')?? 'inactive',
        ];

        
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('about', 'public');
            }
        
            if ($request->hasFile('logo_image')) {
                $data['logo_image'] = $request->file('logo_image')->store('about', 'public');
            }
        
            if ($request->filled('achievements')) {
                $achievements = preg_split('/\r\n|[\r\n,]+/', $request->achievements);
                $data['achievements'] = array_filter(array_map('trim', $achievements));
            }

            $this->mainPageService->updateAbout($id, $data);

            
            // Handle about update logic
        } elseif ('portfolio' == $request->get('type')) {

            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'client' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:255',
                'description' => 'required|string',
                'technologies' => 'nullable|string',
                'project_url' => 'nullable|url|max:500',
                'github_url' => 'nullable|url|max:500',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'tags' => 'nullable|string',
                'status' => 'required|in:active,inactive',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $validated = $validator -> validated();
            $data = [
                'title' => $validated['title'],
                'client' => $validated['client'] ?? null,
                'category' => $validated['category'] ?? null,
                'description' => $validated['description'],
                'technologies' => $validated['technologies'] ?? null,
                'project_url' => $validated['project_url'] ?? null,
                'github_url' => $validated['github_url'] ?? null,
                'thumbnail' => $validated['thumbnail'] ?? null,
                'gallery' => $validated['gallery'] ?? null,
                'tags' => $validated['tags'] ?? null,
                'status' => $validated['status'],
            ];
        
        }
        if ($request->filled('tags')) {
            $tags = preg_split('/\r\n|[\r\n,]+/', $request->tags);
            $data['tags'] = array_filter(array_map('trim', $tags));
        }
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('portfolio', 'public');
        }
        $galleryPaths = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $galleryPaths[] = $image->store('portfolio/gallery', 'public');
            }
            $data['gallery'] = $galleryPaths;
        }
        $this->mainPageService->updatePortfolio($id, $data);
         

        return redirect()->route('admin.main-page.index')->with('success', 'Content updated successfully.');
    }

    public function show($id)
    {
        // Show details logic if needed
        

        if('services' == request()->get('type')) {
            $service = $this->mainPageService->getServicesById($id);
            return view('admin.mainpages.services.show', compact('service'));
        } elseif ('about' == request()->get('type')) {
            $about = $this->mainPageService->getAboutById($id);
            return view('admin.mainpages.about.show', compact('about'));
        } elseif ('portfolio' == request()->get('type')) {
            $portfolio = $this->mainPageService->getPortfolioById($id);
            return view('admin.mainpages.portfolio.show', compact('portfolio'));
        }

        
        
    }

    

}
