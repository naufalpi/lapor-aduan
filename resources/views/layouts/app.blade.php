<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles

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
    @livewireScripts

</body>
</html>
