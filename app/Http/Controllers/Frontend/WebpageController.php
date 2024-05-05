<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebpageController extends Controller
{
    public function homepage()
    {

       
        $varCategories=Category::limit(6)->get();
        $varProducts=Product::take(15)->get();

        return view('frontend.pages.home',compact('varCategories','varProducts'));
    }
    public function about_us()
    {
        return view('frontend.pages.about_us.about_us');
    }

    public function allProducts()
    {
        // $products=Product::where('status','active')->get();
        $collection=Product::all();
        return view('frontend.pages.products', compact('collection'));
    }
}
