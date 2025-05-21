@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-white">
    <div class="max-w-screen-xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-4 gap-8">

        {{-- Sidebar Riwayat --}}

        <div class="border border-gray-300 rounded-lg overflow-hidden">
             <h2 class="text-lg font-semibold text-gray-800 bg-gray-100 text-center  py-2">
                Riwayat Aduan
            </h2>
            <aside class="lg:col-span-1 space-y-6 max-h-[500px] overflow-y-auto pr-1 pl-5 pt-3">
            
                <ol class="relative border-s border-gray-200 dark:border-gray-700">                  
                    <li class="mb-10 ms-6">            
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </span>
                        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-xs sm:flex dark:order-gray-200 dark:border-gray-600">
                            <div class="text-xs text-gray-800 dark:text-gray-800">
                                    <p><strong>Dibuat</strong> oleh Anonim</p>
                                    <p>4 Mei 2025 pukul 12.12 WIB</p>
                                
                                </div>
                    </li>
                    <li class="mb-10 ms-6">
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </span>
                        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-xs dark:order-gray-200 dark:border-gray-600">
                            <h3 class="font-bold text-gray-800 mb-2">Autodisposisi</h3>
                            <div class="text-xs text-gray-800">
                                <p>4 Mei 2025 pukul 12.12 WIB</p>
                                <p class="mt-2">Aduan didisposisikan otomatis ke:</p>
                                <ul class="mt-1 list-disc list-inside">
                                    <li>Dinas Pekerjaan Umum, Perumahan dan ESDM DIY</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="mb-10 ms-6">
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </span>
                        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-xs dark:order-gray-200 dark:border-gray-600">
                            <h3 class="font-bold text-gray-800 mb-2">Ditanggapi</h3>
                            <div class="text-xs text-gray-800">
                                <p>5 Mei 2025 pukul 12.12 WIB</p>
                                <p class="mt-2">Aduan ditanggapi oleh Dinas Pekerjaan Umum, Perumahan dan ESDM DIY</p>
                            
                            </div>
                        </div>
                    </li>
                    <li class="mb-10 ms-6">
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </span>
                        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-xs dark:order-gray-200 dark:border-gray-600">
                            <h3 class="font-bold text-gray-800 mb-2">Diselesaikan</h3>
                            <div class="text-xs text-gray-800">
                                <p>9 Mei 2025 pukul 12.12 WIB</p>
                                <p class="mt-2">Aduan diselesaikan oleh Dinas Pekerjaan Umum, Perumahan dan ESDM DIY</p>
                            
                            </div>
                        </div>
                    </li>
                </ol>

            </aside>
        </div>

        {{-- Konten Utama --}}
        <article class="lg:col-span-3 space-y-6">
            {{-- Info Atas --}}
            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                <span>Oleh <strong>Anonim</strong></span>
                <span>Melalui Website</span>
                <span>Status Aduan: 
                    <span class="inline-block px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                        SELESAI
                    </span>
                </span>
                <span>Diadukan pada <strong>04 Mei 2025</strong></span>
                <span>Nomor Tiket: <strong>0405250002</strong></span>
                <span>Kategori: <strong>Infrastruktur</strong></span>
            </div>

            {{-- Instansi --}}
            <div class="flex flex-wrap gap-2">
                <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">Dinas PUP ESDM DIY</span>
                <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">Dinas Pertanahan DIY</span>
                <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">Pemkot Yogyakarta</span>
            </div>

            {{-- Judul dan Isi --}}
            <h1 class="text-xl md:text-2xl font-bold text-gray-900">Relokasi Sentra Gudeg Wijilan</h1>
            <p class="text-sm md:text-sm text-gray-800 leading-relaxed">
                Apa benar akan diadakannya relokasi untuk kawasan sentra gudeg di Jl. Wijilan? Ini bapak saya sudah panik soalnya cemas mau dipindah ke mana. Mohon pencerahannya, konon katanya isunya sudah kenceng di kalangan bapak-bapak dan ibu-ibu pengurus RT & RW.
            </p>

            {{-- Tabs Info --}}
            <div class="flex flex-wrap gap-6 mt-6 text-sm border-t pt-4">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 8h2a2 2 0 012 2v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7a2 2 0 012-2h2"></path><path d="M12 12v6m0 0l-3-3m3 3l3-3M12 4v4m0 0l-3-3m3 3l3-3"></path></svg>
                    Tindak Lanjut <span class="text-blue-600 font-semibold">(2)</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"></path></svg>
                    Komentar (0)
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10m16 4h2a2 2 0 002-2v-2m-2 4V9a2 2 0 00-2-2H7a2 2 0 00-2 2v10h14z"></path></svg>
                    Lampiran (1)
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2C8.134 2 5 5.134 5 9c0 7.732 7 13 7 13s7-5.268 7-13c0-3.866-3.134-7-7-7z"></path><circle cx="12" cy="9" r="2.5"></circle></svg>
                    Lokasi
                </div>
            </div>

            {{-- Tindak Lanjut --}}
            <div class="space-y-4 mt-4">
                <div class="border-l-4 border-blue-500 pl-4 text-sm">
                    <p class="font-semibold text-gray-800">Pemerintah Kota Yogyakarta</p>
                    <p class="text-xs text-gray-500">05 Mei 2025</p>
                    <p class="text-gray-700 mt-1">
                        Terima kasih telah menyampaikan aduan. Kami koordinasikan dengan instansi terkait.
                    </p>
                </div>
                <div class="border-l-4 border-blue-500 pl-4 text-sm">
                    <p class="font-semibold text-gray-800">Pemerintah Kota Yogyakarta</p>
                    <p class="text-xs text-gray-500">15 Mei 2025</p>
                    <p class="text-gray-700 mt-1">
                        Pengembangan revitalisasi Kawasan Njeron Beteng Kraton saat ini fokus ke konservasi situs, tidak menyentuh perencanaan sentra gudeg Wijilan.
                    </p>
                </div>
            </div>
        </article>
    </div>
</section>
@endsection
