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
        Schema::create('kasbon', function (Blueprint $table) {
            $table->string("id_kasbon", 100)->primary();
            $table->string("id_pembelian");
            $table->foreign("id_pembelian")->references("id_pembelian")->on("pembelian")->onDelete("cascade");
            $table->string("slug");
            $table->foreign("slug")->references("slug")->on("pembelian")->onDelete("cascade");
            $table->double("total_kasbon");
            $table->double("sisa_kasbon");
            $table->date('tanggal_kasbon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasbon');
    }
};
