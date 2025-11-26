<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }
    public function about()
    {
        return view('user.pages.about');
    }
    public function services()
    {
        return view('user.pages.services');
    }



}
