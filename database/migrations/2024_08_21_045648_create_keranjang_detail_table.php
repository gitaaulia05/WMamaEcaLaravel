<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('keranjang_detail', function (Blueprint $table) {
            $table->string('id_detail_keranjang')->primary();
            $table->string('id_keranjang');
            $table->foreign('id_keranjang')->references('id_user')->on('keranjang')->onDelete('cascade');
            $table->string('id_barang');
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onDelete('cascade');
            $table->integer('kuantitas');
            $table->double('total_hargaProduk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang_detail');
    }
};
