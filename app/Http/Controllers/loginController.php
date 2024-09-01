<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\RedirectResponse;
  

class loginController extends Controller
{
    public function index(){
        return view('login', [
            "title" => "Login",
        ]);
    } 

    public function auth_login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // if(Auth::attempt($credentials)){
         
        // $request->session()->regenerate();
        // dd(session()->all());
        // // dd(Auth::check());
        //     return redirect()->intended('/');
        // }
        

        if (Auth::attempt(['email' =>   $credentials['email'] , 'password' =>   $credentials['password'] ])) {
             $request->session()->regenerate();
            // dd(Auth::check(), Auth::user()->id, session()->all());
            return redirect()->intended('/');
        }
            return back()->with('loginError', 'Login Gagal');
        
            
      
    }
}
