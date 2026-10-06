<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Post</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 40px;
    }
    
    .card {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        display: flex;
        flex-direction: row; 
        flex-wrap: wrap;     
        gap: 20px;
        justify-content: center;
    }

    .card-item {
        background-color: #dbdbdb;
        padding: 15px;
        border-radius: 5px;
        max-width: 330px;
    }
    
    .card-item  {
        margin-top: 0;


    }

    .action {
        margin-top: 10px;
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .action a,
    .action button {
        font-size: 13px;
        padding: 6px 12px;
        border: 0;
        border-radius: 4px;
        background-color: #2563eb;
        color: #ffffff;
        cursor: pointer;
        text-decoration: none;
    }

    .action button {
        background-color: #dc2626;
    }

    .alert {
        margin-bottom: 20px;
        padding: 12px;
        color: #065f46;
        background-color: #d1fae5;
        border: 1px solid #a7f3d0;
        border-radius: 4px;
    }
</style>
</head>
<body>
    <div class="container">
        <h1 style="margin-bottom: 20px;">Daftar Posts</h1>

        @if (session('status'))
            <div class="alert">{{ session('status') }}</div>
        @endif

        @guest
            <div class="alert">Silakan <a href="{{ route('login') }}">login</a> untuk mengelola postingan.</div>
        @endguest

        <div class="card">
        @foreach ($post as $posts)
            <div class="card-item">
                <h2>{{ $posts->title }}</h2>
                <p>{{ $posts->content }}</p>
                <p>{{ $posts->author }}</p>
                <p>{{ $posts->description }}</p>

                @auth
                    <div class="action">
                        @can('update', $posts)
                            <a href="{{ route('posts.edit', $posts) }}">Edit</a>
                        @endcan

                        @can('edit-post', $posts)
                            <span>Hak edit via Gate</span>
                        @endcan

                        @can('delete', $posts)
                            <form method="POST" action="{{ route('posts.destroy', $posts) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        @endcan
                    </div>
                @endauth
            </div>
        @endforeach
        </div>
    </div>
</body>
</html>