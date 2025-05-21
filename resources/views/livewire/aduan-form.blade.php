<div class="max-w-xl mx-auto p-6 bg-white rounded-xl shadow-md space-y-6 text-sm">
   {{-- Popup sukses --}}



    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="space-y-4">
        {{-- Judul --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Judul Aduan</label>
            <input wire:model="judul" type="text" class="w-full border-gray-900 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('judul') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
        </div>

        {{-- Isi --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Isi Aduan</label>
            <textarea wire:model="isi" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            @error('isi') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
        </div>

        {{-- Nama --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Nama Lengkap</label>
            <input wire:model="nama" type="text" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('nama') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Email (Opsional)</label>
            <input wire:model="email" type="email" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('email') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
        </div>

        {{-- WhatsApp --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Nomor WhatsApp</label>
            <input wire:model="nomor_wa" type="text" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('nomor_wa') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Kategori</label>
            <input wire:model="kategori" type="text" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('kategori') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
        </div>

        {{-- Lokasi --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Lokasi Kejadian</label>
            <input wire:model="lokasi" type="text" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('lokasi') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
        </div>

        {{-- Lampiran --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Lampiran (Opsional)</label>
            <input wire:model="lampiran" type="file" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('lampiran') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
        </div>

        {{-- Tombol --}}
        <div class="pt-4">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                Kirim Aduan
            </button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    window.addEventListener('swal:success', event => {
        Swal.fire({
            icon: 'success',
            title: event.detail.title,
            text: event.detail.message,
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    });
</script>
</div>
