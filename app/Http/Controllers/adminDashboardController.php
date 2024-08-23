<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminDashboardController extends Controller
{
    public function index(){
        return view('admin/dashboard', [
            'title' => 'ADMIN | Dashboard',
            'page' => 'Dasboard'
        ]);
    }

    public function tambah_data(){
        return view('admin.tambah_data',[
            'title' => 'ADMIN | Tambah Data',
            'page' => 'Dashboard - Tambah Data'
        ]);
    }

}
