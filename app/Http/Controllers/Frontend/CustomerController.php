<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function registrationForm()
    {
        return view('frontend.pages.registration' );
    }

    public function registration(Request $request){

        // dd($request->all());

        Customer::create([
            'name'=>$request->customer_name,
            'email'=>$request->customer_email,
            'password'=>bcrypt($request->customer_password),
        ]);

        notify()->success("Registration succesfull.");
        return redirect()->route('homepage');
    }

    public function loginForm()
    {
        return view('frontend.pages.login');
    }

    public function doLogin(Request $request){

        
        $userInput = ['email'=>$request->customer_email,'password'=>$request->customer_password];

        // $checkLogin=Auth::attempt($userInput);
        $checkLogin = auth()->guard('customerGuard')->attempt($userInput);
        if ($checkLogin) {
           
            notify()->success('Login successful');
            return redirect()->route('homepage');
        }

      
        notify()->error('Invalid credentials.');
        return redirect()->back();
    }
}
