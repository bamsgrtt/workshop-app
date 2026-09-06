<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckShopStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pos:status {jam?}';
    protected $description = 'Mengecek status operasional Toko Kelontong POS';
    /**
     * The console command description.
     *
     * @var string
     */
 
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $jam = $this->argument('jam') ?? 10;
        $this->info("===  SISTEM MONITORING TOKO KELONTONG  ===");
// 1. Meminta input nama kasir
        $namaKasir = $this->ask('Masukkan nama Anda');
        
        // Asumsi toko buka dari jam 08:00 sampai 21:00
        if ($jam >= 8 && $jam <= 21) {
            // 2. Menampilkan nama kasir dengan status BUKA
            $this->info("Halo {$namaKasir}, Status Toko pada jam {$jam}:00 WIB adalah: BUKA");
            $this->comment("Silakan kasir bersiap di meja transaksi.");
        } else {
            // 2. Menampilkan nama kasir dengan status TUTUP
            $this->error("Halo {$namaKasir}, Status Toko pada jam {$jam}:00 WIB adalah: TUTUP");
            $this->warn("Akses transaksi kasir dinonaktifkan sementara.");
        }   
    }
}
