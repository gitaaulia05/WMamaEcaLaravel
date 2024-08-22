<?php

namespace App\Http\Controllers;

use session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        return view('login', [
            "title" => "Login",
        ]);
    }

    public function auth_login(Request $request){
        $credentials = $request->validate([
            'no_hp' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/register');
        }else 
        return back()->with('loginError', 'Login Gagal');

    }
}
