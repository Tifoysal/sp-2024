<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function list()
    {

        $products=Product::with('category')->get();
        return view('backend.pages.product.list',compact('products'));
    }


    public function  createForm()
    {
        $categories=Category::all();// it will return collection
        return view('backend.pages.product.create',compact('categories'));
    }


    public function  productStore(Request $request)
    {
       
        //validation

        // dd($request->all());


        //2.2: make a path for this image
        $fileName=null;
        
        if($request->hasFile('image'))
        {
            //generate name i.e: 20240416170933.jpeg
            $fileName=date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
           
             //2.3: store it into public folder
             $request->file('image')->storeAs('/products',$fileName);
             //public/uploads/category/20244394343.png

        }

        //query to store product data into product table
        Product::create([
            //bam pase column name=>dan pase input field er name
            'category_id'=>$request->category_id,
            'name'=>$request->product_name,
            'image'=>$fileName,
            'price'=>$request->price,
            'stock'=>$request->quantity,
        ]);


        notify()->success('Product Created Successfully.');

        return redirect()->route('product.list');



    }


    // for web Page
    function allProducts(){
        return view('frontend.pages.products.products');
    }

}
