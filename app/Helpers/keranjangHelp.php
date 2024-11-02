<?php
namespace App\Helpers;


class keranjangHelp
{

    public static function setBarangDipilih(array $barangId){
        session()->put('barang_dipilih', $barangId);
        return $barangId;
    }

    public static function getBarangDipilihSession(){
        return session()->get('barang_dipilih' , []);
    }

    public static function setKuantitasDipilih(array $kuantitas){

        session()->put('kuantitas_barang', $kuantitas);
        return $kuantitas;
    }
    
    public static function getKuantitasDipilihSession(){
        return session()->get('kuantitas_barang', []);
    }

    public static function setHargaDipilih(array $harga){

        session()->put('harga_barang', $harga);
        return $harga;
    }
    
    public static function getHargaDipilihSession(){
        return session()->get('harga_barang', []);
    }

}