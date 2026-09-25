<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Rekap Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; }
        .card-container { display: flex; gap: 20px; margin-top: 20px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex: 1; }
        .card h3 { margin: 0 0 10px 0; font-size: 14px; color: #6c757d; }
        .card p { margin: 0; font-size: 22px; font-weight: bold; color: #333; }
    </style>
</head>
<body>
    <h1>📊 Rekap Statistik Penjualan</h1>

    <div class="card-container">
        <div class="card">
            <h3>Total Penjualan</h3>
            <p>Rp {{ number_format($statistik['total_penjualan'], 0, ',', '.') }}</p>
        </div>
        <div class="card">
            <h3>Total Transaksi</h3>
            <p>{{ $statistik['total_transaksi'] }} Transaksi</p>
        </div>
        <div class="card">
            <h3>Produk Terlaris</h3>
            <p>{{ $statistik['produk_terlaris'] }}</p>
        </div>
        <div class="card">
            <h3>Rata-rata Harian</h3>
            <p>Rp {{ number_format($statistik['rata_rata_harian'], 0, ',', '.') }}</p>
        </div>
    </div>
</body>
</html>