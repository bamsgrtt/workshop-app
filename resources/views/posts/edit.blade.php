<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 40px;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 24px;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    label {
        display: block;
        margin-bottom: 6px;
    }

    input,
    textarea {
        box-sizing: border-box;
        width: 100%;
        padding: 10px;
        border: 1px solid #cccccc;
        border-radius: 4px;
    }

    textarea {
        min-height: 120px;
    }

    .error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 14px;
    }

    .alert {
        margin-bottom: 20px;
        padding: 12px;
        color: #991b1b;
        background-color: #fee2e2;
        border: 1px solid #fecaca;
        border-radius: 4px;
    }

    button {
        padding: 10px 16px;
        color: #ffffff;
        background-color: #2563eb;
        border: 0;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Edit Post</h1>

        @if ($errors->any())
            <div class="alert" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Konten</label>
                <textarea name="content" id="content">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description">{{ old('description', $post->description) }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>