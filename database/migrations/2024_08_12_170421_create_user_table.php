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
        Schema::create('user', function (Blueprint $table) {
            $table->string('id_user' ,100)->primary();
            $table->string('nama', 45)->nullable();
            $table->string('no_hp', 12)->nullable()->unique();
            $table->text('alamat');
            $table->string('password');
            $table->double('limit')->default(0);
            $table->boolean('role')->default(false);
            $table->date('dibuat_tanggal');
            $table->date('diupdate_tanggal');
                        // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
