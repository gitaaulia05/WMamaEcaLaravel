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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->string('id_pembelian')->primary();
            $table->string('id_user', 100);
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->string('id_kasbon',100);
            $table->foreign('id_kasbon')->references('id_kasbon')->on('kasbon')->onDelete('cascade');
            $table->double('total_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
