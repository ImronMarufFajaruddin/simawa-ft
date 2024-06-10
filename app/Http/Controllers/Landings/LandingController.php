<?php

namespace App\Http\Controllers\Landings;

use App\Models\User;
use App\Models\Admin\Berita;
use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use App\Http\Controllers\Controller;
use App\Models\Admin\KategoriInstansi;

class LandingController extends Controller
{
    public function index()
    {
        $dataKategoriInstansi = KategoriInstansi::all();
        $dataInstansi = Instansi::with('kategoriInstansi')->get();
        $dataBerita = Berita::latest()->take(4)->get();
        // $dataBerita = Berita::latest()->get();
        $dataUser = User::all();
        return  view('landings-page.index', compact('dataInstansi', 'dataBerita', 'dataKategoriInstansi', 'dataUser'));
    }
}
