<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import untuk penyimpanan gambar

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

    public function editBarang($id)
{
    $barang = Barang::findOrFail($id); 

    return view('admin.update_barang', [
        'title' => 'ADMIN | Edit Data',
        'page' => 'Dashboard - Edit Data',
        'barang' => $barang 
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


    public function tambah_data()
    {
        return view('admin.tambah_data', [
            'title' => 'ADMIN | Tambah Data',
            'page' => 'Dashboard - Tambah Data'
        ]);
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

    // Generate id_barang secara manual
    $data['id_barang'] = uniqid();

    // Menyimpan file gambar
    if ($request->hasFile('img')) {
        $data['img'] = $request->file('img')->store('images', 'public');
    }

    // Menyimpan data ke database
    Barang::create($data);

    return redirect()->route('dash_admin')->with('success', 'Data barang berhasil disimpan.');
}

}