<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Carbon\Carbon;
use App\Models\Admin\Lpj;
use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use App\Models\Admin\Kegiatan;
use App\Models\Admin\Proposal;
use App\Http\Controllers\Controller;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class StatistikController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan input tahun mulai dan tahun akhir
        $tahunMulai = $request->input('tahun_mulai', Carbon::now()->year);
        $tahunAkhir = $request->input('tahun_akhir', Carbon::now()->year);

        // Mengambil data instansi dan menghitung jumlah kegiatan, proposal, dan lpj berdasarkan user_id dan tahun
        $instansiData = Instansi::all()->map(function ($instansi) use ($tahunMulai, $tahunAkhir) {
            // Menghitung jumlah kegiatan berdasarkan instansi dan tahun
            $jumlahKegiatan = Kegiatan::where('user_id', $instansi->user_id)
                ->whereYear('tanggal_mulai', '>=', $tahunMulai)
                ->whereYear('tanggal_mulai', '<=', $tahunAkhir)
                ->count();

            // Menghitung jumlah proposal berdasarkan instansi dan tahun
            $jumlahProposal = Proposal::where('user_id', $instansi->user_id)
                ->whereYear('created_at', '>=', $tahunMulai)
                ->whereYear('created_at', '<=', $tahunAkhir)
                ->count();

            // Menghitung jumlah LPJ berdasarkan instansi dan tahun
            $jumlahLpj = Lpj::where('user_id', $instansi->user_id)
                ->whereYear('created_at', '>=', $tahunMulai)
                ->whereYear('created_at', '<=', $tahunAkhir)
                ->count();

            // Total kegiatan, proposal, dan lpj
            $totalAktivitas = $jumlahKegiatan + $jumlahProposal + $jumlahLpj;

            return [
                'instansi' => $instansi->nama_resmi,
                'jumlah_kegiatan' => $jumlahKegiatan,
                'jumlah_proposal' => $jumlahProposal,
                'jumlah_lpj' => $jumlahLpj,
                'total_aktivitas' => $totalAktivitas,
            ];
        });

        // Total kegiatan, proposal, dan lpj
        $totalKegiatan = $instansiData->sum('jumlah_kegiatan');
        $totalProposal = $instansiData->sum('jumlah_proposal');
        $totalLpj = $instansiData->sum('jumlah_lpj');
        $totalAktivitasKeseluruhan = $totalKegiatan + $totalProposal + $totalLpj;

        // Menghitung persentase keaktifan
        $instansiData = $instansiData->map(function ($data) use ($totalAktivitasKeseluruhan) {
            $data['persentase_keaktifan'] = $totalAktivitasKeseluruhan > 0 ? ($data['total_aktivitas'] / $totalAktivitasKeseluruhan) * 100 : 0;
            return $data;
        })->sortByDesc('persentase_keaktifan')->values();

        return view('admin.statistik.index', compact('instansiData', 'tahunMulai', 'tahunAkhir', 'totalKegiatan', 'totalProposal', 'totalLpj'));
    }

    public function cetakPdf(Request $request)
    {
        // Mendapatkan input tahun mulai dan tahun akhir
        $tahunMulai = $request->input('tahun_mulai', Carbon::now()->year);
        $tahunAkhir = $request->input('tahun_akhir', Carbon::now()->year);

        // Mengambil data instansi dan menghitung jumlah kegiatan, proposal, dan lpj berdasarkan user_id dan tahun
        $instansiData = Instansi::all()->map(function ($instansi) use ($tahunMulai, $tahunAkhir) {
            // Menghitung jumlah kegiatan berdasarkan instansi dan tahun
            $jumlahKegiatan = Kegiatan::where('user_id', $instansi->user_id)
                ->whereYear('tanggal_mulai', '>=', $tahunMulai)
                ->whereYear('tanggal_mulai', '<=', $tahunAkhir)
                ->count();

            // Menghitung jumlah proposal berdasarkan instansi dan tahun
            $jumlahProposal = Proposal::where('user_id', $instansi->user_id)
                ->whereYear('created_at', '>=', $tahunMulai)
                ->whereYear('created_at', '<=', $tahunAkhir)
                ->count();

            // Menghitung jumlah LPJ berdasarkan instansi dan tahun
            $jumlahLpj = Lpj::where('user_id', $instansi->user_id)
                ->whereYear('created_at', '>=', $tahunMulai)
                ->whereYear('created_at', '<=', $tahunAkhir)
                ->count();

            // Total kegiatan, proposal, dan lpj
            $totalAktivitas = $jumlahKegiatan + $jumlahProposal + $jumlahLpj;

            return [
                'instansi' => $instansi->nama_resmi,
                'jumlah_kegiatan' => $jumlahKegiatan,
                'jumlah_proposal' => $jumlahProposal,
                'jumlah_lpj' => $jumlahLpj,
                'total_aktivitas' => $totalAktivitas,
            ];
        });

        // Total kegiatan, proposal, dan lpj
        $totalKegiatan = $instansiData->sum('jumlah_kegiatan');
        $totalProposal = $instansiData->sum('jumlah_proposal');
        $totalLpj = $instansiData->sum('jumlah_lpj');
        $totalAktivitasKeseluruhan = $totalKegiatan + $totalProposal + $totalLpj;

        // Menghitung persentase keaktifan
        $instansiData = $instansiData->map(function ($data) use ($totalAktivitasKeseluruhan) {
            $data['persentase_keaktifan'] = $totalAktivitasKeseluruhan > 0 ? ($data['total_aktivitas'] / $totalAktivitasKeseluruhan) * 100 : 0;
            return $data;
        });

        // Filter untuk data peringkat
        $peringkatData = $instansiData->filter(function ($data) {
            return $data['persentase_keaktifan'] > 0;
        })->sortByDesc('persentase_keaktifan')->values()->take(5);

        // Mendapatkan URL dan query filter
        $url = $request->fullUrl();

        // Memuat view PDF dengan data yang telah dihitung
        $pdf = PDF::loadView('admin.statistik.pdf', compact('instansiData', 'peringkatData', 'tahunMulai', 'tahunAkhir', 'totalKegiatan', 'totalProposal', 'totalLpj', 'url'));

        // Mengembalikan file PDF sebagai stream
        return $pdf->stream('laporan-statistik.pdf');
    }


    public function chart(Request $request)
    {
        // Mendapatkan input tahun mulai dan tahun akhir
        $tahunMulai = $request->input('tahun_mulai', Carbon::now()->year);
        $tahunAkhir = $request->input('tahun_akhir', Carbon::now()->year);

        // Mengambil data instansi dan menghitung jumlah kegiatan, proposal, dan lpj berdasarkan user_id dan tahun
        $instansiData = Instansi::all()->map(function ($instansi) use ($tahunMulai, $tahunAkhir) {
            $jumlahKegiatan = Kegiatan::where('user_id', $instansi->user_id)
                ->whereYear('tanggal_mulai', '>=', $tahunMulai)
                ->whereYear('tanggal_mulai', '<=', $tahunAkhir)
                ->count();

            $jumlahProposal = Proposal::where('user_id', $instansi->user_id)
                ->whereYear('created_at', '>=', $tahunMulai)
                ->whereYear('created_at', '<=', $tahunAkhir)
                ->count();

            $jumlahLpj = Lpj::where('user_id', $instansi->user_id)
                ->whereYear('created_at', '>=', $tahunMulai)
                ->whereYear('created_at', '<=', $tahunAkhir)
                ->count();

            $totalAktivitas = $jumlahKegiatan + $jumlahProposal + $jumlahLpj;

            return [
                'instansi' => $instansi->nama_resmi,
                'total_aktivitas' => $totalAktivitas,
            ];
        });

        // Menghitung total aktivitas keseluruhan
        $totalAktivitasKeseluruhan = $instansiData->sum('total_aktivitas');

        //  data untuk pie chart dengan persentase
        $labels = $instansiData->pluck('instansi')->toArray();
        $data = $instansiData->map(function ($data) use ($totalAktivitasKeseluruhan) {
            return $totalAktivitasKeseluruhan > 0 ? ($data['total_aktivitas'] / $totalAktivitasKeseluruhan) * 100 : 0;
        })->toArray();

        //  pie chart
        $chart = (new LarapexChart)->pieChart()
            ->setTitle('Persentase Keaktifan Instansi')
            ->setSubtitle('Berdasarkan Kegiatan, Proposal, dan LPJ')
            ->addData($data)
            ->setLabels($labels);

        return view('admin.statistik.chart', compact('chart', 'tahunMulai', 'tahunAkhir'));
    }
}
