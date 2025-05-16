@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8 bg-white shadow rounded">
    <h1 class="text-2xl font-bold mb-4">{{ $aduan->judul }}</h1>
    <p class="text-gray-800 mb-4">{{ $aduan->isi }}</p>

    <div class="text-sm text-gray-700">
        <p><strong>Nama:</strong> {{ $aduan->nama }}</p>
        <p><strong>Status:</strong> {{ $aduan->status }}</p>
        <p><strong>Nomor Tiket:</strong> {{ $aduan->nomor_tiket }}</p>
        <p><strong>Kategori:</strong> {{ $aduan->kategori ?? '-' }}</p>
        <p><strong>Lokasi:</strong> {{ $aduan->lokasi ?? '-' }}</p>
    </div>

    @if($aduan->tanggapan)
    <div class="mt-6 bg-gray-100 p-4 rounded">
        <h2 class="text-md font-semibold mb-2">Tanggapan Admin:</h2>
        <p>{{ $aduan->tanggapan }}</p>
    </div>
    @endif
</div>
@endsection