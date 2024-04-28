<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebpageController extends Controller
{
    public function homepage()
    {
        return view('frontend.pages.home');
    }
    public function about_us()
    {
        return view('frontend.pages.about_us.about_us');
    }

    public function allProducts()
    {
            return view('frontend.pages.products');
    }
}
