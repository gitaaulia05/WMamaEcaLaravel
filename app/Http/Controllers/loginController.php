<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
  

class loginController extends Controller
{
    public function index(){
        return view('login', [
            "title" => "Login",
        ]);
    } 

    public function auth_login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'no_hp' => 'required',
            'password' => 'required'
        ]);

        // if(Auth::attempt($credentials)){
        //     $request->session()->regenerate();
        //     return redirect()->intended('/');
        // }
        
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/'); // Redirect to intended page
        }

            return back()->with('loginError', 'Login Gagal');
        
            
      
    }
}
