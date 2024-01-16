<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6|max:255',
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with(["errors" => $validator->errors()]);
        }

        $credential = $request->only('email','password');
        if (Auth::attempt($credential)) {
            return redirect()->route('dashboard')->with(["success" => "Login Successful"]);
        }
        return redirect()->back()->with(["errors" => "These credentials do not match our records"]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
