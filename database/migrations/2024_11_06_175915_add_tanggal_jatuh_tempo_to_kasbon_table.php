<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanggalJatuhTempoToKasbonTable extends Migration
{
    public function up()
    {
        Schema::table('kasbon', function (Blueprint $table) {
            $table->boolean('notifikasi_terkirim')->default(false); // Menambahkan kolom dengan default false
        });
    }
    
    public function down()
    {
        Schema::table('kasbon', function (Blueprint $table) {
            $table->dropColumn('notifikasi_terkirim'); // Menghapus kolom jika rollback
        });
    }
    
    
}
