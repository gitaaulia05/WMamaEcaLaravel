<?php

namespace App\Http\Controllers;

use Auth;
use session;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
  

class AuthenticateController extends Controller
{

    public function index(){
        return view('login', [
            "title" => "Login",
        ]);
    } 

    public function auth_login()
    {

        $credentials = request()->validate([
        'no_hp' => ['required' , ],
            'password' => ['required','min:8']
        ]);

        if(!Auth::attempt($credentials)) {
                throw ValidationException::withMessages([
                    'no_hp' => 'Maaf , nomor handphone anda tidak valid'
                ]);
        }
             request()->session()->regenerate();
        return redirect('/');
    }

    public function destroy(){
        Auth::logout();

        return redirect('/login');
    }


    // REGISTER 
    public function register(){
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