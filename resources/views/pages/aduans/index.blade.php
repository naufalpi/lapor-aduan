@extends('layouts.app')



@section('title', 'Lapor Mbae Guse | Aduan')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-2xl font-bold mb-6 text-center">Daftar Laporan Aduan</h1>
    {{-- <x-aduan-search /> --}}

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
@endsection