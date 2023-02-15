<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="token" content="{{ csrf_token() }}">
    <title>@yield('title') | True Games</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="wrapper">
        @include('layouts.header')
        <main class="main">
            @yield('content')
        </main>
        <footer class="footer">

        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
