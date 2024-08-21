<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function index(){
        return view('register', [
            "title" => "Register"
        ]);
    }
}
