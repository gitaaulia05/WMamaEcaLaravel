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
        Schema::create('jenis_barang', function (Blueprint $table) {
            $table->string('id_jenis_barang')->primary();
            $table->string('id_barang', 100);
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onDelete('cascade');
            $table->string('jenis_barang', '100');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_barang');
    }
};
