<div class="bg-white dark:bg-dark-900 border rounded-lg p-4 shadow-sm hover:shadow-md transition hover:bg-gray-100">
    <div class="p-3">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $aduan->judul }}</h2>
        <p class="text-xs text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($aduan->isi, 50) }}</p>
        <p class="text-sm text-gray-500"><strong>{{ $aduan->nama }}</strong></p>
        <p class="text-xs text-gray-500">19-05-2025 12.56 WIB</p>
        <div class="flex justify-between items-center w-full text-xs text-gray-600">
            <!-- Kiri: Kategori -->
            <span class="font-semibold">{{ $aduan->kategori }}</span>

            <!-- Kanan: Status -->
            <span class="inline-block px-2 py-1 rounded
                {{ $aduan->status == 'Selesai' ? 'bg-green-200 text-green-800' : 
                ($aduan->status == 'Diproses' ? 'bg-yellow-200 text-yellow-800' : 'bg-gray-200 text-gray-800') }}">
                {{ $aduan->status }}
            </span>
        </div>

        
    </div>
</div>


{{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

    <div class="border rounded-lg p-4 shadow-sm hover:shadow-md transition">
        <h2 class="text-lg font-semibold text-black mb-1 truncate">{{ Str::limit($aduan->judul, 40) }}</h2>
        <p class="text-sm text-gray-700 mb-4">{{ Str::limit($aduan->isi, 100) }}</p>
        
        <div class="flex items-center gap-2 text-sm text-black mb-4">
            <div class="flex items-center gap-1">
                <svg class="w-5 h-5 text-black" fill="currentColor"><!-- icon user --></svg>
                <span class="font-semibold">{{ $aduan->nama ?? 'Anonim' }}</span>
            </div>
            <span>·</span>
            <span>Senin, 12 Mei 2025 Pukul 13.00 WIB</span>
            <span>·</span>
            <div class="flex items-center gap-1 truncate">
                <svg class="w-4 h-4 text-black" fill="currentColor"><!-- icon globe --></svg>
                <span class="truncate">Website Pelapor</span>
            </div>
        </div>

        <div class="flex gap-2 mt-auto">
            <span class="bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded flex items-center gap-1">
                <svg class="w-4 h-4" fill="currentColor"><!-- icon tag --></svg>
                Infrastruktur
            </span>
            <span class="bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded flex items-center gap-1">
                <svg class="w-4 h-4" fill="currentColor"><!-- icon bell --></svg>
                {{ $aduan->status }}
            </span>
        </div>
    </div>

</div> --}}

