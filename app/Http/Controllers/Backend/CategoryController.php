<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function list()
    {

        $categories=Category::paginate(5); //select * from categories;
        // dd($box);


      return view('backend.pages.category.list',compact('categories'));
    }

    public function categoryForm()
    {
        return view('backend.pages.category.create');
    }

    public function categoryStore(Request $request)
    {

        $checkValidation=Validator::make($request->all(),[
            'cat_name'=>'required',
        ]);

        if($checkValidation->fails())
        {
           
            // notify()->error("something went wrong.");
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }
       

        Category::create([
            //bam pase column name => dan pase value
            'name'=>$request->cat_name,
            'description'=>$request->description
        ]);

        notify()->success('Category created successfully.');

    return redirect()->route('category.list');
    }


}
