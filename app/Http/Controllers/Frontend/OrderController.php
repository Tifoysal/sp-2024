<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function  addToCart($productId)
    {
       
      
        $product=Product::find($productId);
        $myCart=session()->get('cart');
        
        if(empty($myCart)){
            //1. add to cart
            $newCart[$productId]=[
                'id'=>$productId,
                'name'=>$product->name,
                'price'=>$product->price,
                'image'=>$product->image,
                'quantity'=>1,
                'subtotal'=>$product->price * 1
            ];

            // dd($newCart);

            session()->put('cart',$newCart);

            notify()->success('Product added to cart successfully.');
            return redirect()->back();

        }
        else{
            dd("cart not empty");
        }


    }
}
