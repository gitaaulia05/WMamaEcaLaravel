<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'no_hp' => 'required|numeric|digits:12|unique:user',
            'password' => 'required|min:8'

        ]);
        $validateData['id_user'] = (string) Str::uuid();
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        return redirect('/login')->with('success' , 'Akun Berhasil Dibuat');
    }

}
