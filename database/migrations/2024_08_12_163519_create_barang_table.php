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
        Schema::create('barang', function (Blueprint $table) {
            $table->string('id_barang',100)->primary();
            $table->string('nama_barang');
            $table->string('slug');
            $table->string('img');
            $table->integer('stok_barang');
            $table->double('harga_barang');
            $table->text('deks_barang');
            $table->boolean('is_arsip')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
