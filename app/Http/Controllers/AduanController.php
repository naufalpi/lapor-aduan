<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AduanController extends Controller
{
    public function index() {
        $aduans = Aduan::latest()->paginate(9);
        return view('pages.aduans.index', compact('aduans'));
    }

    public function create() {
        return view('pages.aduans.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required',
                'nama' => 'required|string|max:100',
                'email' => 'nullable|email',
                'nomor_wa' => 'required|string|max:20',
                'kategori' => 'required|string|max:100',
                'lokasi' => 'required|string|max:255',
                'lampiran' => 'nullable|array|max:3', // maksimal 3 file
                'lampiran.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);

            $validated['slug'] = Str::slug($validated['judul']) . '-' . Str::random(5);
            $validated['nomor_tiket'] = strtoupper(Str::random(8));
            $validated['status'] = 'Menunggu';

            $lampiranPaths = [];

            if ($request->hasFile('lampiran')) {
                foreach ($request->file('lampiran') as $file) {
                    $lampiranPaths[] = $file->store('lampiran', 'public');
                }
            }

            // Simpan file sebagai JSON jika ada, atau null
            $validated['lampiran'] = count($lampiranPaths) > 0 ? json_encode($lampiranPaths) : null;

            Aduan::create($validated);

            return redirect()->back()->with('success', 'Aduan berhasil dikirim!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Aduan gagal dikirim. Silakan coba lagi atau periksa lampiran.');
        }
    }

    public function show($slug) {
        $aduan = Aduan::where('slug', $slug)->firstOrFail();
        return view('pages.aduans.show', compact('aduan'));
    }
}
