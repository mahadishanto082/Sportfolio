<?php

namespace App\Services\Admin;

use App\Models\Services;
use App\Models\About;
use App\Models\AboutMain;
use App\Models\ServicesMain;  
use App\Models\PortfolioMain;  
use App\Models\Portfolio;
use App\Models\TestimonialsMain;


class MainPageService
{
    /**
     * Get all services
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getServices()
{
    return ServicesMain::first(); // fetch saved record from main_services_page
}

public function getServicesById($id)
{
    return ServicesMain::findOrFail($id);
}

public function updateServices($id, $data)
{
    $service = ServicesMain::findOrFail($id);
    $service->update($data);
    return $service;
}

    /**
     * Get the about content
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getAbout()
    {
        return AboutMain::first(); 
    }

    public function getAboutById($id)
    {
        return AboutMain::findOrFail($id);
    }

    public function updateAbout($id, $data)
    {
        $about = AboutMain::findOrFail($id);
        $about->update($data);
        return $about;
    }

    /**
     * Get all portfolio items
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    

    


     public function getPortfolio()
    {
        return PortfolioMain::first();
    }
    public function getPortfolioById($id)
    {
        return PortfolioMain::findOrFail($id);
    }
    public function updatePortfolio($id, $data)
    {
        $portfolio = PortfolioMain::findOrFail($id);
        $portfolio->update($data);
        return $portfolio;
    }
    public function getAllPortfolioItems()
    {
        return Portfolio::all();
    }
    /**
     * Get all testimonials
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTestimonials()
    {
        return TestimonialsMain::all();
    }
    

    
}