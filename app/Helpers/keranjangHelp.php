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

        public static function setKuantitasDipilih(array $kuantitas , array $barangId){
            $kuantitasDipilih = [];

          foreach($barangId as $index => $id_barang){
            $kuantitasDipilih[$id_barang] = $kuantitas[$index] ?? 1;
          }
            session()->put('kuantitas_barang', $kuantitasDipilih);
            return $kuantitasDipilih;
        }
    
    public static function getKuantitasDipilihSession(){
        return session()->get('kuantitas_barang', []);
    }

    public static function setHargaDipilih(array $harga , array $barangId){

        $hargaDipilih = [];

        foreach($barangId as $index => $id_barang){
            $hargaDipilih[$id_barang] = $harga[$index] ?? 1;
        }

        session()->put('harga_barang', $hargaDipilih);
        return $hargaDipilih;
    }
    
    public static function getHargaDipilihSession(){
        return session()->get('harga_barang', []);
    }

}