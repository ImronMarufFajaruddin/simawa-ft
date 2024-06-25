<?php

namespace App\Http\Controllers\Landings;

use Illuminate\Support\Str;
use App\Models\Admin\Berita;
use Illuminate\Http\Request;
use App\Models\Admin\Anggota;
use App\Models\Admin\Instansi;
use App\Models\Landing\Footer;
use App\Models\Landing\HeroModel;
use App\Models\Admin\LevelJabatan;
use App\Http\Controllers\Controller;
use App\Models\Admin\KategoriInstansi;

class LandingInstansiController extends Controller
{
    public function index(Request $request, $slug)
    {

        $dataHero = HeroModel::first();
        $dataFooter = Footer::all();

        $dataKategoriInstansi = KategoriInstansi::all();
        $dataInstansi = Instansi::with('kategoriInstansi')
            ->get()
            ->first(function ($instansi) use ($slug) {
                return Str::slug($instansi->nama_singkatan) === $slug;
            });

        if (!$dataInstansi) {
            abort(404);
        }
        // Ambil daftar tahun periode yang tersedia dari level_jabatan
        $availableYears = LevelJabatan::select('periode')
            ->distinct()
            ->where('instansi_id', $dataInstansi->id)
            ->orderBy('periode', 'desc')
            ->pluck('periode');

        // Ambil tahun periode yang dipilih dari query string
        $selectedYear = $request->query('tahun');

        // Ambil data anggota berdasarkan instansi_id dan filter berdasarkan tahun periode jika dipilih
        $dataAnggota = Anggota::where('instansi_id', $dataInstansi->id);

        if ($selectedYear) {
            $dataAnggota->whereHas('levelJabatan', function ($query) use ($selectedYear) {
                $query->where('periode', $selectedYear);
            });
        }

        $dataAnggota = $dataAnggota->get();

        // Kirimkan data ke view
        return view('landings-page.instansi.index', compact('dataKategoriInstansi', 'dataInstansi', 'dataFooter', 'dataHero', 'dataAnggota', 'selectedYear', 'availableYears'));
    }

    // // Ambil data level jabatan berdasarkan instansi_id dengan urutan tertentu
    // $dataLevelJabatan = LevelJabatan::where('instansi_id', $dataInstansi->id)
    //     ->orderByRaw("FIELD(level, '1', '2', '3', '4')") // Sesuaikan urutan level yang diinginkan
    //     ->get();

    // // Kelompokkan anggota berdasarkan level jabatan
    // $anggotaByLevel = [];
    // foreach ($dataLevelJabatan as $levelJabatan) {
    //     $anggotaByLevel[$levelJabatan->level] = $dataAnggota->where('level_jabatan_id', $levelJabatan->id);
    // }

    // Kirimkan data ke view
    // return view('landings-page.instansi.index', compact('dataKategoriInstansi', 'dataInstansi', 'dataAnggota', 'availableYears', 'selectedYear'));
}
