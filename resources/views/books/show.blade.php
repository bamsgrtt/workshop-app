<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .detail { margin-top: 20px; line-height: 1.6; }
        .btn { display: inline-block; padding: 8px 12px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; margin-top: 15px; }
    </style>
</head>
<body>

    <h2>Detail Buku</h2>

    <div class="detail">
        <p><strong>Nama Buku:</strong> {{ $book->name }}</p>
        <p><strong>Harga:</strong> Rp {{ number_format($book->harga, 0, ',', '.') }}</p>
        <p><strong>Stok:</strong> {{ $book->stok }}</p>
        <p><strong>Dibuat pada:</strong> {{ $book->created_at }}</p>
        <p><strong>Diperbarui pada:</strong> {{ $book->updated_at }}</p>
    </div>

    <a href="{{ route('book.index') }}" class="btn">Kembali ke Daftar Buku</a>

</body>
</html>
