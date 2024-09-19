<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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

    public function pesanan($slug)
    {
        return view('user.pesanan' , [
            "title" => "PROFILE | USER",
            "data" => pembelian::with(['detail_pembelian.namaBarang' ])->where('id_user' , Auth::id())->get(),
        ]);
    }
    
    public function user_test(){
        return view('welcome');
    }
}
