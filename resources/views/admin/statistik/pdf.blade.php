<!DOCTYPE html>
<html>

<head>
    <title>Laporan Statistik</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            border-top: 1px solid black;
            padding: 10px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <h1>Laporan: {{ $tahunMulai }}-{{ $tahunAkhir }}</h1>
    <h2>Total Statistik:</h2>
    <table>
        <tr>
            <th>Total Kegiatan</th>
            <th>Total Proposal Masuk</th>
            <th>Total LPJ Masuk</th>
        </tr>
        <tr>
            <td>{{ $totalKegiatan }}</td>
            <td>{{ $totalProposal }}</td>
            <td>{{ $totalLpj }}</td>
        </tr>
    </table>

    <h2>Peringkat:</h2>
    <table>
        <tr>
            <th>Peringkat</th>
            <th>Instansi</th>
            <th>Jumlah Kegiatan</th>
            <th>Keaktifan</th>
        </tr>
        @foreach ($peringkatData as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data['instansi'] }}</td>
                <td>{{ $data['jumlah_kegiatan'] }}</td>
                <td>{{ number_format($data['persentase_keaktifan'], 2) }}%</td>
            </tr>
        @endforeach
    </table>

    <h2>Semua Data Statistik Instansi:</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>Instansi</th>
            <th>Kegiatan</th>
            <th>Proposal</th>
            <th>LPJ</th>
            <th>Persentase Keaktifan</th>
        </tr>
        @foreach ($instansiData as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data['instansi'] }}</td>
                <td>{{ $data['jumlah_kegiatan'] }}</td>
                <td>{{ $data['jumlah_proposal'] }}</td>
                <td>{{ $data['jumlah_lpj'] }}</td>
                <td>{{ number_format($data['persentase_keaktifan'], 2) }}%</td>
            </tr>
        @endforeach
    </table>

    <div class="footer">

        <p>Dokumen ini dicetak dari: {{ $url }}</p>

        {{-- <p>Lporan ini dihasilkan dari halaman <strong>{{ route('data-statistik.index') }}</strong> dengan
            filter:
            Tahun Mulai = {{ $tahunMulai }}, Tahun Akhir = {{ $tahunAkhir }}.</p> --}}
    </div>
</body>

</html>
