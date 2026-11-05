<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Acara 31 - Upload Gambar</title>
</head>
<body>
    <nav>
        <a href="{{ route('acara31.index') }}">Menu Acara 31</a>
    </nav>
    <h1>Upload dan Resize Gambar</h1>

    {{-- Tampilkan pesan sukses setelah gambar berhasil diproses. --}}
    @if (session('success'))
        <p>{{ session('success') }}</p>
        @if (session('filename'))
            <img src="{{ asset('uploads/' . session('filename')) }}" alt="Gambar hasil upload" style="max-width: 300px;">
        @endif
    @endif

    {{-- Tampilkan pesan validasi jika form memiliki kesalahan. --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{-- multipart/form-data diperlukan untuk mengirim file ke server. --}}
    <form method="POST" action="{{ route('acara31.upload') }}" enctype="multipart/form-data">
        @csrf
        <label for="photo">Pilih gambar:</label>
        <input type="file" name="photo" id="photo" accept="image/jpeg,image/png" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
