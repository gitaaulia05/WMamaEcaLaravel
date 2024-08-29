<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        
        if(Auth::check()){
            return view('user.index',[
                "title" => 'USER'
            ]);
        }

        return redirect('/');
    }

    
}
