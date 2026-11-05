<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acara 31 - Laravel Image Manipulation</title>
    <style>
        body { max-width: 900px; margin: 2rem auto; padding: 0 1rem; font-family: Arial, sans-serif; }
        section { border: 1px solid #ddd; border-radius: 8px; padding: 1rem; margin: 1rem 0; }
        label { display: block; margin: .5rem 0; }
        button { padding: .5rem 1rem; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Acara 31 - Laravel Image Manipulation</h1>
    <p>Pilih operasi, masukkan gambar, lalu tekan tombol proses. Ukuran file maksimal 2 MB.</p>

    @if ($errors->any())
        <div role="alert">
            <strong>Periksa input berikut:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        $operations = [
            ['resize', 'Resize 300 Ã— 200'],
            ['crop', 'Crop 200 Ã— 200 (x=100, y=100)'],
            ['rotate', 'Rotate 45 derajat'],
            ['format', 'Konversi ke PNG'],
            ['show-image', 'Tampilkan langsung di browser'],
            ['quality', 'JPEG kualitas 75'],
        ];
    @endphp

    @foreach ($operations as [$routeName, $label])
        <section>
            <h2>{{ $label }}</h2>
            <form method="POST" action="{{ route('acara31.' . $routeName) }}" enctype="multipart/form-data">
                @csrf
                <label>Gambar:
                    <input type="file" name="photo" accept="image/jpeg,image/png,image/webp" required>
                </label>
                <button type="submit">Proses {{ $label }}</button>
            </form>
        </section>
    @endforeach

    <section>
        <h2>Tambahkan watermark</h2>
        <form method="POST" action="{{ route('acara31.watermark') }}" enctype="multipart/form-data">
            @csrf
            <label>Gambar utama:
                <input type="file" name="photo" accept="image/jpeg,image/png,image/webp" required>
            </label>
            <label>Gambar watermark:
                <input type="file" name="watermark" accept="image/png,image/jpeg,image/webp" required>
            </label>
            <button type="submit">Tambahkan watermark</button>
        </form>
    </section>

    <section>
        <h2>Upload dan resize menjadi 300 Ã— 300</h2>
        <form method="POST" action="{{ route('acara31.upload') }}" enctype="multipart/form-data">
            @csrf
            <label>Gambar:
                <input type="file" name="photo" accept="image/jpeg,image/png" required>
            </label>
            <button type="submit">Upload dan resize</button>
        </form>
    </section>
</body>
</html>
