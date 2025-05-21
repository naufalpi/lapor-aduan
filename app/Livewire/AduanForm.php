<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Aduan;
use Illuminate\Support\Str;

class AduanForm extends Component
{
    use WithFileUploads;

    public $judul, $isi, $nama, $email, $nomor_wa, $kategori, $lokasi, $lampiran;



   public function submit()
    {
        $this->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'nama' => 'required|string|max:100',
            'email' => 'nullable|email',
            'nomor_wa' => 'required|string|max:20',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'lampiran' => 'nullable|file|max:2048',
        ]);

        $slug = Str::slug($this->judul) . '-' . Str::random(5);
        $nomorTiket = strtoupper(Str::random(8));

        $lampiranPath = $this->lampiran?->store('lampiran', 'public');

        Aduan::create([
            'judul' => $this->judul,
            'slug' => $slug,
            'isi' => $this->isi,
            'nama' => $this->nama,
            'email' => $this->email,
            'nomor_wa' => $this->nomor_wa,
            'kategori' => $this->kategori,
            'lokasi' => $this->lokasi,
            'nomor_tiket' => $nomorTiket,
            'lampiran' => $lampiranPath,
        ]);

        // Reset semua input form, termasuk lampiran
        $this->reset(['judul', 'isi', 'nama', 'email', 'nomor_wa', 'kategori', 'lokasi', 'lampiran']);

        // Emit event JS untuk tampilkan SweetAlert
        $this->dispatchBrowserEvent('swal:success', [
            'title' => 'Berhasil!',
            'message' => 'Aduan berhasil dikirim.'
        ]);
    }


    public function render()
    {
        return view('livewire.aduan-form');
    }
}

