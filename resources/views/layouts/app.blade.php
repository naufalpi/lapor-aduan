<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <x-navbar />

    @if (Request::is('/'))
        <x-hero />
    @endif
   
    <main class="container min-h-screen mx-auto py-20">
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
