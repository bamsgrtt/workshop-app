<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acara 31 - {{ $title }}</title>
</head>
<body>
    <h1>{{ $title }} berhasil</h1>
    <p>Hasil manipulasi gambar:</p>
    <img src="{{ asset($path) }}" alt="{{ $title }}" style="max-width: 100%; height: auto;">
    <p><a href="{{ route('acara31.index') }}">Kembali ke menu Acara 31</a></p>
</body>
</html>
