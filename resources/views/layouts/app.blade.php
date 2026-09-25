<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>@yield('title', 'Aplikasi POS Toko')</title>
  
    @stack('styles')
</head>
<body>
    @include('layouts.header')

    <main class="container">
        @yield('content')
    </main>

    @include('layouts.footer')

    @stack('scripts')

</body>
</html>