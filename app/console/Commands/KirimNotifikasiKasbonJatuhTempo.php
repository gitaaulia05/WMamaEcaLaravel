<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Kasbon;
use Carbon\Carbon;
use App\Notifications\KasbonJatuhTempo;

class KirimNotifikasiKasbonJatuhTempo extends Command
{
    // Signature adalah nama command yang akan digunakan di terminal
    protected $signature = 'kasbon:notifikasi-jatuh-tempo';

    // Deskripsi command (opsional, tapi bagus untuk dokumentasi)
    protected $description = 'Kirim notifikasi untuk kasbon yang jatuh tempo dalam 1 bulan';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Logika untuk command
        $tanggalBulanDepan = Carbon::now()->addMonth()->format('Y-m-d');

        $kasbons = Kasbon::whereDate('tanggal_jatuh_tempo', $tanggalBulanDepan)
                         ->where('notifikasi_terkirim', false)
                         ->get();

        foreach ($kasbons as $kasbon) {
            $kasbon->user->notify(new KasbonJatuhTempo($kasbon));
            $kasbon->notifikasi_terkirim = true;
            $kasbon->save();
        }

        $this->info('Notifikasi jatuh tempo kasbon berhasil dikirim.');
    }
}
