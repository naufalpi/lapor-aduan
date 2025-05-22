@extends('layouts.app')

@section('title', 'Lapor Mbae Guse')

@section('content')

<div class="container mx-auto px-4 py-2">
    <h1 class="text-2xl font-bold mb-6 text-center">Daftar Laporan Aduan</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($aduans as $aduan)
            <a href="{{ route('aduans.show', $aduan->slug) }}" class="block">
                <x-aduan-card :aduan="$aduan" />
            </a>
        @endforeach
    </div>

    
    <div class="mt-4">
        {{ $aduans->links() }}
    </div>
    
</div>

@if (Request::is('/'))
<script>
    const navbar = document.getElementById('navbar');
    let isScrolled = false;

    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            isScrolled = true;
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('bg-gray-900/80', 'shadow');
        } else {
            isScrolled = false;
            navbar.classList.remove('bg-gray-900/80', 'shadow');
            navbar.classList.add('bg-transparent');
        }
    });

    navbar.addEventListener('mouseenter', function () {
        if (!isScrolled) {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('bg-gray-900/80', 'shadow');
        }
    });

    navbar.addEventListener('mouseleave', function () {
        if (!isScrolled) {
            navbar.classList.remove('bg-gray-900/80', 'shadow');
            navbar.classList.add('bg-transparent');
        }
    });
</script>
@endif

@endsection

