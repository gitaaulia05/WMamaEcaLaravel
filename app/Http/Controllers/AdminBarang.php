<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\barang;

class AdminBarang extends Controller
{
    //
    public function create()
    {
        return view('barang.create'); 
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Insert validated data into database
        barang::create($validatedData);

        // Redirect back with success message
        return redirect()->route('barang.create')->with('success', 'Barang created successfully');
    }

    public function read()
    {
        // Retrieve all Barang records
        $barang = barang::all();

        // Pass the data to a Blade view
        return view('barang.read', compact('barang'));
    }
}
