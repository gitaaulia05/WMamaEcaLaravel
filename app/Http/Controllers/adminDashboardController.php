<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class adminDashboardController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();

        return view('admin.dashboard', [
            'title' => 'ADMIN | Dashboard',
            'page' => 'Dashboard',
            'barangs' => $barangs,
        ]);
    }

    public function detail_barang($slug){
        return view('admin.barang.detail_barang',[
            'title' => 'ADMIN | Detail Barang',
            'page' => 'Dashboard - Detail Barang',
            'barang' => barang::where('slug' , $slug)->first(),
        ]);
    }

    
    public function edit_barang($slug){
        return view('admin.barang.edit_barang',[
            'title' => 'ADMIN | Ubah Data Barang',
            'page' => 'Dashboard - Ubah Data Barang',
            'barang' => barang::where('slug' , $slug)->first(),
        ]);
    }

    public function tambah_data()
    {
        return view('admin.tambah_data', [
            'title' => 'ADMIN | Tambah Data',
            'page' => 'Dashboard - Tambah Data'
        ]);
    }

 
public function updateBarang(Request $request, $id)
{
    $barang = Barang::findOrFail($id); 

    $data = $request->validate([
        'nama_barang' => 'required|string|max:255',
        'stok_barang' => 'required|numeric',
        'harga_barang' => 'required|numeric',
        'deks_barang' => 'required|string',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' 
    ]);

    // Update the fields
    $barang->nama_barang = $data['nama_barang'];
    $barang->stok_barang = $data['stok_barang'];
    $barang->harga_barang = $data['harga_barang'];
    $barang->deks_barang = $data['deks_barang'];

    // Check for a new image and update if provided
    if ($request->hasFile('img')) {
        // Store new image and update the img field
        $barang->img = $request->file('img')->store('images', 'public');
    }

    $barang->save();

    return redirect()->route('dash_admin')->with('success', 'Data barang berhasil diperbarui.');
}



    public function simpanBarang(Request $request)
{
    $data = $request->validate([
        'nama_barang' => 'required|string|max:255',
        'stok_barang' => 'required|numeric',
        'harga_barang' => 'required|numeric',
        'deks_barang' => 'required|string',
        'created_at' => 'required|date',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
}

}