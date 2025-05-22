    @extends('layouts.app')




    @section('content')

    <div>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
        });
    </script>
    @endif



    <form action="{{ route('aduans.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl mx-auto bg-white p-6 rounded-lg ">
        @csrf

        <h2 class="text-xl text-center font-semibold mb-4 text-gray-800">Form Lapor Aduan</h2>

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan nama Anda" required>
            </div>
            <div>
                <label for="nomor_wa" class="block mb-2 text-sm font-medium text-gray-900">Nomor HP / WA</label>
                <input type="tel" id="nomor_wa" name="nomor_wa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="08xxxxxxxxxx" required  oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                value="{{ old('nomor_wa') }}">
                @error('nomor_wa')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email (Opsional)</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan email Anda">
            </div>
            <div>
                <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">Lokasi Kejadian</label>
                <input type="text" id="lokasi" name="lokasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Alamat lengkap kejadian" required>
            </div>
        </div>

        <div class="mb-6">
            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul Aduan</label>
            <input type="text" id="judul" name="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Lampu Jalan Mati" required>
        </div>

        <div class="mb-6">
            <label for="isi" class="block mb-2 text-sm font-medium text-gray-900">Isi Aduan</label>
            <textarea id="isi" name="isi" rows="5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Tuliskan kronologi aduan secara detail..." required></textarea>
        </div>

        <div class="mb-6">
            <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900">Kategori Aduan</label>
            <select id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Infrastruktur">Infrastruktur</option>
                <option value="Kesehatan">Kesehatan</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Lingkungan">Lingkungan</option>
                <option value="Pelayanan publik">Pelayanan Publik</option>
                <option value="Keamanan">Keamanan dan Ketertiban</option>
                <option value="Sosial">Sosial dan Kesejahteraan</option>
                <option value="Bencana">Bencana Alam</option>
                <option value="Transportasi">Transportasi dan Lalu Lintas</option>
                <option value="Air dan sanitasi">Air dan Sanitasi</option>
                <option value="Penerangan jalan">Penerangan Jalan</option>
                <option value="Perizinan">Perizinan dan Administrasi</option>
                <option value="Ekonomi">Ekonomi dan UMKM</option>
                <option value="Pariwisata">Pariwisata dan Kebudayaan</option>
                <option value="Pertanian">Pertanian dan Perkebunan</option>
                <option value="Ketenagakerjaan">Ketenagakerjaan</option>
                <option value="Perdagangan">Perdagangan</option>
                <option value="Lainnya">Lainnya</option>
            </select>

        </div>

        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900">Lampiran (Opsional, max 3 file) - <strong>jpg, png, pdf</strong></label>

            <div id="lampiran-wrapper" class="space-y-2">
                <!-- Input awal -->
                <div class="relative file-input-wrapper">
                    <input type="file" name="lampiran[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none p-2" />
                </div>
            </div>

            <!-- Tombol tambah file -->
            <button type="button" id="tambah-lampiran" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 font-medium rounded-sm text-sm px-2 py-1 me-2 mb-2 mt-2 dark:bg-green-600 dark:hover:bg-green-700 ">
                + Tambah File
            </button>
        </div>





        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-6 py-2.5 text-center">
            Kirim Aduan
        </button>
    </form>

    <script>
        const wrapper = document.getElementById('lampiran-wrapper');
        const btnTambah = document.getElementById('tambah-lampiran');

        function updateUI() {
            const items = wrapper.querySelectorAll('.file-input-wrapper');
            
            items.forEach((item, index) => {
                let removeBtn = item.querySelector('.btn-remove');
                
                // Tambah tombol X kalau belum ada dan bukan input pertama
                if (!removeBtn && index > 0) {
                    removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.innerHTML = '&times;';
                    removeBtn.className = 'btn-remove absolute top-1/2 -translate-y-1/2 right-2 text-red-600 font-bold text-lg hover:text-red-800';
                    removeBtn.addEventListener('click', () => {
                        item.remove();
                        updateUI();
                    });
                    item.appendChild(removeBtn);
                }

                // Sembunyikan X kalau input pertama
                if (removeBtn && index === 0) {
                    removeBtn.remove();
                }
            });

            // Sembunyikan tombol tambah jika sudah 3 input
            if (items.length >= 3) {
                btnTambah.style.display = 'none';
            } else {
                btnTambah.style.display = 'inline-flex';
            }
        }

        function createInputFile() {
            const div = document.createElement('div');
            div.className = 'relative file-input-wrapper';

            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'lampiran[]';
            input.className = 'block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none p-2';

            div.appendChild(input);
            return div;
        }

        btnTambah.addEventListener('click', () => {
            if (wrapper.querySelectorAll('input[type="file"]').length < 3) {
                wrapper.appendChild(createInputFile());
                updateUI();
            }
        });

        // Inisialisasi saat pertama dimuat
        updateUI();
    </script>

    </div>

    {{-- {{-- <livewire:aduan-form /> --}}

     {{-- <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow text-xs">

        <h1 class="text-xl font-bold mb-4">Form Aduan</h1>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>
        @endif

        <form action="{{ route('aduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium text-gray-700">Judul Aduan</label>
                <input name="judul" type="text" class="w-full border-gray-300 rounded" value="{{ old('judul') }}">
                @error('judul') <div class="text-red-500 text-xs">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Isi Aduan</label>
                <textarea name="isi" rows="4" class="w-full border-gray-300 rounded">{{ old('isi') }}</textarea>
                @error('isi') <div class="text-red-500 text-xs">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Nama Lengkap</label>
                <input name="nama" type="text" class="w-full border-gray-300 rounded" value="{{ old('nama') }}">
                @error('nama') <div class="text-red-500 text-xs">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Email (Opsional)</label>
                <input name="email" type="email" class="w-full border-gray-300 rounded" value="{{ old('email') }}">
                @error('email') <div class="text-red-500 text-xs">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Nomor WhatsApp</label>
                <input name="nomor_wa" type="text" class="w-full border-gray-300 rounded" value="{{ old('nomor_wa') }}">
                @error('nomor_wa') <div class="text-red-500 text-xs">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Kategori</label>
                <input name="kategori" type="text" class="w-full border-gray-300 rounded" value="{{ old('kategori') }}">
                @error('kategori') <div class="text-red-500 text-xs">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Lokasi Kejadian</label>
                <input name="lokasi" type="text" class="w-full border-gray-300 rounded" value="{{ old('lokasi') }}">
                @error('lokasi') <div class="text-red-500 text-xs">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Lampiran (Opsional)</label>
                <input name="lampiran" type="file" class="w-full border-gray-300 rounded">
                @error('lampiran') <div class="text-red-500 text-xs">{{ $message }}</div> @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                    Kirim Aduan
                </button>
            </div>
        </form>
    </div> --}}



    @endsection