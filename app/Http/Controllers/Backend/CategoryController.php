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

        $categories = Category::paginate(5); //select * from categories;
        // dd($box);


        return view('backend.pages.category.list', compact('categories'));
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

        if ($checkValidation->fails()) {
            // notify()->error("something went wrong.");
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }
        //2.2: make a path for this image
        $fileName=null;
        if($request->hasFile('category_image'))
        {
            //generate name i.e: 20240416170933.jpeg
            $fileName=date('YmdHis').'.'.$request->file('category_image')->getClientOriginalExtension();
           
             //2.3: store it into public folder
             $request->file('category_image')->storeAs('/category',$fileName);
             //public/uploads/category/20244394343.png

        }

       
       

        Category::create([
            //bam pase column name => dan pase value
            'name'=>$request->cat_name,
            'description'=>$request->description,
            'image'=>$fileName
        ]);

        notify()->success('Category created successfully.');

        return redirect()->route('category.list');
    }

    public function categoryEdit($id)
    {

        $category = Category::find($id);

        return view('backend.pages.category.edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        $request->validate([
            'cat_name' => 'required',
        ]);

        // old data
        $category = Category::find($id);

        $category->update([
            'name' => $request->cat_name,
            'description' => $request->description,
            'status' => $request->status
        ]);
        notify()->success('Category updated successfully');
        return to_route('category.list');
    }
}
