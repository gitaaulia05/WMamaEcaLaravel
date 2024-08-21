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
        Schema::create('detail_kasbon', function (Blueprint $table) {
            $table->string('id_det_kasbon')->primary();
            $table->string('id_kasbon');
            $table->foreign('id_kasbon')->references('id_kasbon')->on('kasbon')->onDelete('cascade');
            $table->integer('cicilan_ke');
            $table->double('total_bayar');
            $table->date('tanggal_bayar');
            $table->boolean('is_lunas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kasbon');
    }
};
