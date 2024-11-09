<?php

namespace App\Http\Controllers;


use App\Models\barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.barang.tambah_data', [
            'title' => 'ADMIN | Tambah Data',
            'page' => 'Dashboard - Tambah Data'
        ]);
    }

 
public function updateBarang(Request $request, $slug)
{
    $barang = Barang::where('slug' , $slug)->first(); 

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

    if ($request->hasFile('img')) {
            if($barang->img && Storage::disk('public')->exists($barang->img)){
                Storage::disk('public')->delete($barang->img);
            }
        $barang->img = $request->file('img')->store('barang' , 'public');
    }

    $barang->save();
    return redirect()->route('dash_admin')->with('message-success', 'Data barang berhasil diperbarui.');
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

            $data['img'] = $request->file('img');
            $data['img'] = $request->file('img')->store('barang', 'public');
            $data['id_barang'] = (String) Str::uuid();
                barang::create($data);

                return redirect('dashboard-admin')->with('message-success' , 'Tambah Data Barang Berhasil!');
}


        public function destroy($slug)
        {
           $barang = barang::where('slug' , $slug)->first();

           Storage::delete('storage/barang/' .$barang->img);

           $barang->delete();

          return redirect('dashboard-admin')->with('message-success' , 'Hapus Barang Berhasil');
        }

}