<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    public function index() {
        $aduans = Aduan::latest()->paginate(9);
        return view('pages.aduans.index', compact('aduans'));
    }

    public function show($slug) {
        $aduan = Aduan::where('slug', $slug)->firstOrFail();
        return view('pages.aduans.show', compact('aduan'));
    }
}
