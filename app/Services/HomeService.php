<?php

namespace App\Services;
use App\Models\HeaderContent;



use App\Models\Titlepage;
use App\Models\Services;
use App\Models\About;
use App\Models\Tech;
use App\Models\Portfolio;

use App\Models\Contact;


class HomeService
{
    /**
     * Get all dropdown items grouped by button name
     *
     * @return array
     */
    

    /**
     * Get all dropdown items with additional information
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
   

    /**
     * Get the title page content
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTitlePageContent()
    {
        return Titlepage::all();
    }
    public function getServices()
    {
        return Services::all();
        
    }
    public function getAbout()
    {
        return About::first();
    }
    public function getTech()
    {
        return Tech::all();
    }
     public function getPortfolio()
     {
        return Portfolio::all();
     }


    public function getContact()
    {
        return Contact::first();
    }

}