<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { display: inline-block; padding: 8px 12px; color: white; text-decoration: none; border-radius: 4px; margin-right: 4px; }
        .btn-success { background: #28a745; }
        .btn-primary { background: #007bff; }
        .btn-warning { background: #ffc107; color: #000; }
        .btn-danger { background: #dc3545; }
        .alert { padding: 10px; background: #d4edda; color: #155724; margin-bottom: 15px; }
        form { display: inline; }
    </style>
</head>
<body>

    <h2>Daftar Buku</h2>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('book.create') }}" class="btn btn-success">+ Tambah Buku</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $index => $book)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $book->name }}</td>
                    <td>Rp {{ number_format($book->harga, 0, ',', '.') }}</td>
                    <td>{{ $book->stok }}</td>
                    <td>
                        <a href="{{ route('book.show', $book) }}" class="btn btn-primary">Lihat</a>
                        <a href="{{ route('book.edit', $book) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('book.destroy', $book) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
