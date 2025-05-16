<div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
    <div class="p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $aduan->judul }}</h2>
        <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($aduan->isi, 100) }}</p>
        <p class="text-sm text-gray-500">Nama: <strong>{{ $aduan->nama }}</strong></p>
        <p class="text-sm text-gray-500 mb-2">Status: 
            <span class="inline-block px-2 py-1 rounded 
                {{ $aduan->status == 'Selesai' ? 'bg-green-200 text-green-800' : 
                   ($aduan->status == 'Diproses' ? 'bg-yellow-200 text-yellow-800' : 'bg-gray-200 text-gray-800') }}">
                {{ $aduan->status }}
            </span>
        </p>
    </div>
</div>
