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
</style>
</head>
<body>
    <div class="container">
    <h1 style="margin-bottom: 20px;">Daftar Posts</h1>
    
    <div class="card">
        @foreach ($post as $posts)
            <div class="card-item">
                <h2>{{ $posts->title }}</h2>
                <p>{{ $posts->content }}</p>
                <p>{{ $posts->author }}</p>
                <p>{{ $posts->description }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>