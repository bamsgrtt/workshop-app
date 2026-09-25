<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; max-width: 400px; padding: 8px; box-sizing: border-box; }
        button { padding: 8px 15px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        a { margin-left: 10px; }
        .error { color: #dc3545; font-size: 0.9em; margin-top: 4px; }
    </style>
</head>
<body>

    <h2>Edit Data Buku</h2>

    <form action="{{ route('book.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Buku:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $book->name) }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" value="{{ old('harga', $book->harga) }}" required>
            @error('harga')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" value="{{ old('stok', $book->stok) }}" required>
            @error('stok')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Perbarui Data</button>
        <a href="{{ route('book.index') }}">Batal</a>
    </form>

</body>
</html>
