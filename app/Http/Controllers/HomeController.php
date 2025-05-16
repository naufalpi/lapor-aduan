<?php

namespace App\Http\Controllers;
use App\Models\Aduan;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $aduans = Aduan::latest()->paginate(9);
        return view('pages.home.index', compact('aduans'));
    }
}
