<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $statistik = [
            'total_penjualan' => 158500000,
            'total_transaksi' => 342,
            'produk_terlaris' => 'Laptop ThinkPad',
            'rata_rata_harian' => 5283333,
        ];

        return view('laporan.index', compact('statistik'));
    }
}
