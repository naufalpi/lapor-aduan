<div>
    <input
        type="text"
        wire:model.debounce.300ms="search"
        placeholder="Cari aduan..."
        class="w-full mb-6 p-3 border border-gray-300 rounded shadow-sm"
    >

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($aduans as $aduan)
            <a href="{{ route('aduans.show', $aduan->slug) }}" class="block">
                <x-aduan-card :aduan="$aduan" />
            </a>
        @empty
            <p class="col-span-full text-gray-500">Tidak ada hasil ditemukan.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $aduans->links() }}
    </div>
</div>
