<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function list()
    {
        return view('backend.pages.product.list');
    }


    public function  createForm()
    {
        $categories=Category::all();// it will return collection
        return view('backend.pages.product.create',compact('categories'));
    }


    public function  productStore(Request $request)
    {
       
        //validation

        //query to store product data into product table
        

        

    }


    // for web Page
    function allProducts(){
        return view('frontend.pages.products.products');
    }

}
