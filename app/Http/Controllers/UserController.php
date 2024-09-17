<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
            return view('user.index',[
                "title" => 'USER'
            ]);
    }  


    public function profile()
    {
        return view('user.profile' , [
            "title" => "PROFILE | USER"
        ]);
    }
    
    public function user_test(){
        return view('welcome');
    }
}
