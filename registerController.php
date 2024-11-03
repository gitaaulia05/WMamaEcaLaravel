<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\users;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
   

    public function index(){
        return view('register', [
            "title" => "Register"
        ]);
    }

    public function create_user(Request $request){
  
        $validateData = $request->validate([
           
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric|digits:12|unique:users',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8'

        ]);
        $validateData['id_user'] = (string) Str::uuid();
        $validateData['password'] = Hash::make($request->password);
       $user =  User::create($validateData);

    Auth::login($user);

      return redirect('/')->with('success' , 'Akun Berhasil Dibuat');
    }

}
