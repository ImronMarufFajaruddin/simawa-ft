<?php

namespace App\Http\Controllers\Landings;

use App\Models\User;
use App\Models\Admin\Berita;
use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use App\Models\Landing\Footer;
use App\Models\Landing\HeroModel;
use App\Http\Controllers\Controller;
use App\Models\Admin\KategoriBerita;
use App\Models\Admin\KategoriInstansi;

class LandingBeritaController extends Controller
{
    public function index(Request $request)
    {
        $dataHero = HeroModel::first();
        $dataFooter = Footer::all();
        $dataKategoriInstansi = KategoriInstansi::all();
        $dataInstansi = Instansi::with('kategoriInstansi')->get();
        $instansi = Instansi::all();
        $dataKategoriBerita = KategoriBerita::all();

        // Ambil nama_singkatan dan kategori dari query string
        $namaSingkatan = $request->query('from');
        $query = $request->input('search');
        $kategori = $request->input('kategori');

        // Filter berita berdasarkan nama_singkatan jika ada
        if ($namaSingkatan) {
            $instansi = Instansi::where('nama_singkatan', $namaSingkatan)->first();
            if ($instansi) {
                $dataBerita = Berita::where('user_id', $instansi->user_id)->latest()->paginate(10);
            } else {
                $dataBerita = collect(); // Jika instansi tidak ditemukan, kembalikan koleksi kosong
            }
        } else {
            // Filter berita berdasarkan query pencarian dan kategori
            $dataBerita = Berita::with(['user.instansi', 'kategoriBerita'])
                ->when($query, function ($queryGet) use ($query) {
                    $queryGet->where('judul', 'LIKE', "%{$query}%")
                        ->orWhereHas('user.instansi', function ($q) use ($query) {
                            $q->where('nama_singkatan', 'LIKE', "%{$query}%");
                        })
                        ->orWhereHas('kategoriBerita', function ($q) use ($query) {
                            $q->where('kategori_nama', 'LIKE', "%{$query}%");
                        });
                })
                ->when($kategori, function ($queryGet) use ($kategori) {
                    $queryGet->whereHas('kategoriBerita', function ($q) use ($kategori) {
                        $q->where('kategori_nama', $kategori);
                    });
                })
                ->latest()
                ->paginate(10);
        }

        return view('landings-page.berita.index', compact('dataInstansi', 'dataBerita', 'dataKategoriInstansi', 'dataHero', 'dataFooter', 'instansi', 'namaSingkatan', 'query', 'kategori', 'dataKategoriBerita'));
    }

    public function show($slug)
    {
        $dataHero = HeroModel::first();
        $dataFooter = Footer::all();
        $dataKategoriInstansi = KategoriInstansi::all();
        $dataInstansi = Instansi::with('kategoriInstansi')->get();
        $dataBerita = Berita::where('slug', $slug)->first();

        if (!$dataBerita) {
            abort(404);
        }

        $dataUser = User::all();
        return view('landings-page.berita.detail', compact('dataInstansi', 'dataBerita', 'dataKategoriInstansi', 'dataUser', 'dataHero', 'dataFooter'));
    }
}
