<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Main</title>
</head>
<body>
    <header>
        @include('layouts.header')
    </header>
    <main class="w-11/12 m-auto">
        @yield("content")
    </main>
    <footer>
        @include('layouts.footer')
    </footer>
    @stack('scripts')
</body>
</html>
