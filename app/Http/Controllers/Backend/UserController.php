<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('backend.pages.login');
    }

    public function doLogin(Request $request)
    {
        $userInput = $request->except('_token');

        // $checkLogin=Auth::attempt($userInput);
        $checkLogin = auth()->attempt($userInput);
        if ($checkLogin) {
            notify()->success('Login successful');
            return redirect()->route('dashboard');
        }
        notify()->error('Invalid credentials.');
        return redirect()->back();
    }

    public function signout()
    {
        auth()->logout();
        notify()->success('Logout successful');
        return view('backend.pages.login');
    }
}
