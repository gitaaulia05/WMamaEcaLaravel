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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id_user' ,100)->primary();
            $table->string('nama', 45)->nullable();
            $table->string('no_hp', 12)->nullable()->unique();
            $table->string('email', 100)->nullable()->unique();
            $table->text('alamat');
            $table->string('password');
            $table->double('limit')->default(500000);
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
