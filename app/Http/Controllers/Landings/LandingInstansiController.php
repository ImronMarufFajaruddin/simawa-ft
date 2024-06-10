<?php

namespace App\Http\Controllers\Landings;

use Illuminate\Support\Str;
use App\Models\Admin\Berita;
use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use App\Http\Controllers\Controller;
use App\Models\Admin\KategoriInstansi;

class LandingInstansiController extends Controller
{
    public function index($slug)
    {
        $dataKategoriInstansi = KategoriInstansi::all();
        $dataInstansi = Instansi::with('kategoriInstansi')
            ->get()
            ->first(function ($instansi) use ($slug) {
                return Str::slug($instansi->nama_singkatan) === $slug;
            });

        if (!$dataInstansi) {
            abort(404);
        }
        // $dataInstansi = Instansi::with('kategoriInstansi')->where('nama_singkatan', $nama_singkatan)->firstOrFail();
        return view('landings-page.instansi.index', compact('dataKategoriInstansi', 'dataInstansi'));
    }
}
