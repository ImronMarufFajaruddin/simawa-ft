<?php

namespace App\Http\Controllers\Landings;

use App\Models\User;
use App\Models\Admin\Berita;
use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use App\Models\Landing\Footer;
use App\Models\Landing\HeroModel;
use App\Http\Controllers\Controller;
use App\Models\Admin\KategoriInstansi;

class LandingBeritaController extends Controller
{
    public function index()
    {
        $dataHero = HeroModel::first();
        $dataFooter = Footer::all();

        $dataKategoriInstansi = KategoriInstansi::all();
        $dataInstansi = Instansi::with('kategoriInstansi')->get();
        $dataBerita = Berita::latest()->get();
        return view('landings-page.berita.index', compact('dataInstansi', 'dataBerita', 'dataKategoriInstansi', 'dataHero', 'dataFooter'));
    }

    public function show($id)
    {
        $dataHero = HeroModel::first();
        $dataFooter = Footer::all();

        $dataKategoriInstansi = KategoriInstansi::all();
        $dataInstansi = Instansi::with('kategoriInstansi')->get();
        $dataBerita = Berita::find($id);
        $dataUser = User::all();
        return view('landings-page.berita.detail', compact('dataInstansi', 'dataBerita', 'dataKategoriInstansi', 'dataUser', 'dataHero', 'dataFooter'));
    }
}
