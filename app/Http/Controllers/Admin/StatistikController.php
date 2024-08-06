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
        // Mengambil tahun mulai dan akhir dari request atau default ke tahun sekarang
        $tahunMulai = $request->input('tahun_mulai', Carbon::now()->year);
        $tahunAkhir = $request->input('tahun_akhir', Carbon::now()->year);

        // Mengambil data instansi dan menghitung statistik
        $instansiData = Instansi::all()->map(function ($instansi) use ($tahunMulai, $tahunAkhir) {
            return $this->getInstansiStatistics($instansi, $tahunMulai, $tahunAkhir);
        });

        // Hitung total dari semua instansi untuk menyesuaikan persentase
        $totalKegiatan = $instansiData->sum('jumlah_kegiatan');
        $totalProposal = $instansiData->sum('jumlah_proposal');
        $totalLpj = $instansiData->sum('jumlah_lpj');

        // Hitung persentase untuk setiap instansi
        $instansiData = $instansiData->map(function ($data) use ($totalKegiatan, $totalProposal, $totalLpj) {
            // Hitung persentase
            $persentaseKegiatan = $totalKegiatan > 0 ? ($data['jumlah_kegiatan'] / $totalKegiatan) * 25 : 0;
            $persentaseProposal = $totalProposal > 0 ? ($data['jumlah_proposal'] / $totalProposal) * 25 : 0;
            $persentaseLpj = $totalLpj > 0 ? ($data['jumlah_lpj'] / $totalLpj) * 50 : 0;

            // Hitung total persentase
            $totalPersentase = $persentaseKegiatan + $persentaseProposal + $persentaseLpj;

            return [
                'instansi' => $data['instansi'],
                'jumlah_kegiatan' => $data['jumlah_kegiatan'],
                'jumlah_proposal' => $data['jumlah_proposal'],
                'jumlah_lpj' => $data['jumlah_lpj'],
                'total_persentase' => min($totalPersentase, 100), // Pastikan tidak lebih dari 100%
            ];
        });

        // Mengurutkan data berdasarkan total persentase
        $instansiData = $instansiData->sortByDesc('total_persentase')->values();

        // Ambil kegiatan tanpa LPJ
        $kegiatanTanpaLpj = $this->getKegiatanTanpaLpj();

        return view('admin.statistik.index', compact(
            'instansiData',
            'tahunMulai',
            'tahunAkhir',
            'totalKegiatan',
            'totalProposal',
            'totalLpj',
            'kegiatanTanpaLpj' // Tambahkan ini
        ));
    }

    private function getInstansiStatistics($instansi, $tahunMulai, $tahunAkhir)
    {
        // Menghitung jumlah kegiatan
        $jumlahKegiatan = Kegiatan::where('user_id', $instansi->user_id)
            ->whereYear('tanggal_mulai', '>=', $tahunMulai)
            ->whereYear('tanggal_mulai', '<=', $tahunAkhir)
            ->count();

        // Menghitung jumlah proposal
        $jumlahProposal = Proposal::where('user_id', $instansi->user_id)
            ->whereYear('created_at', '>=', $tahunMulai)
            ->whereYear('created_at', '<=', $tahunAkhir)
            ->count();

        // Menghitung jumlah LPJ diterima
        $jumlahLpj = Lpj::where('user_id', $instansi->user_id)
            ->where('status', 'diterima')
            ->whereYear('created_at', '>=', $tahunMulai)
            ->whereYear('created_at', '<=', $tahunAkhir)
            ->count();

        return [
            'instansi' => $instansi->nama_resmi,
            'jumlah_kegiatan' => $jumlahKegiatan,
            'jumlah_proposal' => $jumlahProposal,
            'jumlah_lpj' => $jumlahLpj,
        ];
    }

    private function getKegiatanTanpaLpj()
    {
        return Kegiatan::with('instansi', 'lpj')
            ->whereDoesntHave('lpj', function ($query) {
                $query->where('status', 'diterima');
            })
            ->get()
            ->map(function ($kegiatan) {
                // Cek apakah ada LPJ yang terkait
                $statuses = $kegiatan->lpj ? $kegiatan->lpj->pluck('status') : collect(); // Gunakan collect() jika null

                // Tentukan status LPJ berdasarkan status yang ada
                if ($statuses->contains('menunggu')) {
                    $statusLpj = 'Menunggu';
                } elseif ($statuses->contains('revisi')) {
                    $statusLpj = 'Revisi';
                } elseif ($statuses->contains('ditolak')) {
                    $statusLpj = 'Ditolak';
                } else {
                    $statusLpj = 'Belum Mengunggah LPJ'; // Jika tidak ada LPJ sama sekali
                }

                return [
                    'nama_instansi' => $kegiatan->instansi->nama_resmi,
                    'nama_kegiatan' => $kegiatan->nama_kegiatan,
                    'status_lpj' => $statusLpj,
                ];
            });
    }

    public function cetakPdf(Request $request)
    {
        // Mengambil tahun mulai dan tahun akhir dari request atau default ke tahun sekarang
        $tahunMulai = $request->input('tahun_mulai', Carbon::now()->year);
        $tahunAkhir = $request->input('tahun_akhir', Carbon::now()->year);

        // Mengambil data instansi dan menghitung statistik
        $instansiData = Instansi::all()->map(function ($instansi) use ($tahunMulai, $tahunAkhir) {
            return $this->getInstansiStatistics($instansi, $tahunMulai, $tahunAkhir);
        });

        // Hitung total dari semua instansi untuk menyesuaikan persentase
        $totalKegiatan = $instansiData->sum('jumlah_kegiatan');
        $totalProposal = $instansiData->sum('jumlah_proposal');
        $totalLpj = $instansiData->sum('jumlah_lpj');

        // Hitung persentase untuk setiap instansi
        $instansiData = $instansiData->map(function ($data) use ($totalKegiatan, $totalProposal, $totalLpj) {
            // Hitung persentase
            $persentaseKegiatan = $totalKegiatan > 0 ? ($data['jumlah_kegiatan'] / $totalKegiatan) * 25 : 0;
            $persentaseProposal = $totalProposal > 0 ? ($data['jumlah_proposal'] / $totalProposal) * 25 : 0;
            $persentaseLpj = $totalLpj > 0 ? ($data['jumlah_lpj'] / $totalLpj) * 50 : 0;

            // Hitung total persentase
            $totalPersentase = $persentaseKegiatan + $persentaseProposal + $persentaseLpj;

            return [
                'instansi' => $data['instansi'],
                'jumlah_kegiatan' => $data['jumlah_kegiatan'],
                'jumlah_proposal' => $data['jumlah_proposal'],
                'jumlah_lpj' => $data['jumlah_lpj'],
                'total_persentase' => min($totalPersentase, 100), // Pastikan tidak lebih dari 100%
            ];
        });

        // Mengurutkan data berdasarkan total persentase
        $instansiData = $instansiData->sortByDesc('total_persentase')->values();
        // table yang bekum upload lpj atau yang belum disetutjui
        $kegiatanTanpaLpj = $this->getKegiatanTanpaLpj();

        // get url dari query
        $url = $request->fullUrl();

        // Generate PDF
        $pdf = PDF::loadView('admin.statistik.pdf', [
            'instansiData' => $instansiData,
            'tahunMulai' => $tahunMulai,
            'tahunAkhir' => $tahunAkhir,
            'totalKegiatan' => $totalKegiatan,
            'totalProposal' => $totalProposal,
            'totalLpj' => $totalLpj,
            'kegiatanTanpaLpj' => $kegiatanTanpaLpj,
            'url' => $url
        ]);

        // Download PDF
        return $pdf->download('statistik-instansi.pdf');
    }

    public function chart(Request $request)
    {
        // Mendapatkan input tahun mulai dan tahun akhir
        $tahunMulai = $request->input('tahun_mulai', Carbon::now()->year);
        $tahunAkhir = $request->input('tahun_akhir', Carbon::now()->year);

        // Mengambil data instansi dan menghitung statistik
        $instansiData = Instansi::all()->map(function ($instansi) use ($tahunMulai, $tahunAkhir) {
            return $this->getInstansiStatistics($instansi, $tahunMulai, $tahunAkhir);
        });

        // Hitung total dari semua instansi untuk menyesuaikan persentase
        $totalKegiatan = $instansiData->sum('jumlah_kegiatan');
        $totalProposal = $instansiData->sum('jumlah_proposal');
        $totalLpj = $instansiData->sum('jumlah_lpj');

        // Hitung persentase untuk setiap instansi
        $instansiData = $instansiData->map(function ($data) use ($totalKegiatan, $totalProposal, $totalLpj) {
            // Hitung persentase
            $persentaseKegiatan = $totalKegiatan > 0 ? ($data['jumlah_kegiatan'] / $totalKegiatan) * 25 : 0;
            $persentaseProposal = $totalProposal > 0 ? ($data['jumlah_proposal'] / $totalProposal) * 25 : 0;
            $persentaseLpj = $totalLpj > 0 ? ($data['jumlah_lpj'] / $totalLpj) * 50 : 0;

            // Hitung total persentase
            $totalPersentase = $persentaseKegiatan + $persentaseProposal + $persentaseLpj;

            return [
                'instansi' => $data['instansi'],
                'total_persentase' => min($totalPersentase, 100), // Pastikan tidak lebih dari 100%
            ];
        });

        // Mengurutkan data berdasarkan total persentase
        $instansiData = $instansiData->sortByDesc('total_persentase')->values();

        // Menghitung total aktivitas keseluruhan untuk pie chart
        $totalPersentaseKeseluruhan = $instansiData->sum('total_persentase');

        //  data untuk pie chart dengan persentase
        $labels = $instansiData->pluck('instansi')->toArray();
        $data = $instansiData->map(function ($data) use ($totalPersentaseKeseluruhan) {
            return $totalPersentaseKeseluruhan > 0 ? ($data['total_persentase'] / $totalPersentaseKeseluruhan) * 100 : 0;
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
