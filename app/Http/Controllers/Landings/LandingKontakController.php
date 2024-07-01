<?php

namespace App\Http\Controllers\Landings;

use App\Models\Admin\Berita;
use App\Models\Admin\Galeri;
use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use App\Models\Landing\Footer;
use App\Models\Landing\HeroModel;
use App\Http\Controllers\Controller;
use App\Models\Admin\KategoriInstansi;

class LandingKontakController extends Controller
{
    public function index()
    {
        $dataHero = HeroModel::first();
        $dataFooter = Footer::all();
        $dataKategoriInstansi = KategoriInstansi::all();
        $dataInstansi = Instansi::with('user')->get();
        $dataBerita = Berita::latest()->take(4)->get();
        $dataGaleri = Galeri::all();
        $namaSingkatan = $dataInstansi->pluck('nama_singkatan')->unique();

        return view('landings-page.kontak.index', compact('dataHero', 'dataFooter', 'dataKategoriInstansi', 'dataInstansi', 'dataBerita', 'dataGaleri', 'namaSingkatan'));
    }
}
