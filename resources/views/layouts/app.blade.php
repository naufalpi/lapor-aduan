<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <x-navbar />
   

    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
