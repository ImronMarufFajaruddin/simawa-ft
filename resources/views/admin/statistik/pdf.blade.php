<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Statistik Instansi</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            /* Menggunakan flexbox untuk header */
            justify-content: space-between;
            /* Memisahkan judul dan gambar */
            align-items: center;
            /* Mengatur agar item berada di tengah vertikal */
            padding: 20px;
            border-bottom: 1px solid #000;
        }


        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 3px 0;
            font-size: 10px;
        }

        .content {
            padding: 20px;
        }

        .footer {
            position: relative;
            bottom: 0;
            width: 100%;
            text-align: center;
            border-top: 1px solid black;
            padding: 10px;
            font-size: 8px;
        }

        table {
            width: 100%;
            /* Memastikan semua tabel memiliki lebar yang sama */
            border-collapse: collapse;
            /* Menghilangkan jarak antara border */
            margin-top: 20px;
            /* Memberi jarak antara tabel */
        }

        th,
        td {

            border: 1px solid #ddd;
            /* Menambahkan border pada sel */
            padding: 10px;
            /* Memberi padding pada sel */
            text-align: center;
            /* Mengatur teks agar berada di tengah */
            font-size: 11px
        }

        .bg-success {
            background-color: green !important;
            color: white !important;
        }

        .bg-danger {
            background-color: red !important;
            color: white !important;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1 class="text-center">Statistik Instansi</h1>
        <p class="text-center">Tahun: {{ $tahunMulai }} - {{ $tahunAkhir }}</p>
    </div>
    <div class="content">
        <div class="summary">
            <h4>Summary</h4>
            <table class="table table-bordered table-striped">
                <thead class="bg-success">
                    <tr>
                        <th>Total Kegiatan</th>
                        <th>Total Proposal</th>
                        <th>Total LPJ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $totalKegiatan }}</td>
                        <td>{{ $totalProposal }}</td>
                        <td>{{ $totalLpj }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h4 class="mt-3">Instansi Berdasarkan Persentase Keaktifan tertinggi</h4>
        <table class="table">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>No</th>
                    <th>Instansi</th>
                    <th>Jumlah Kegiatan</th>
                    <th>Jumlah Proposal</th>
                    <th>Jumlah LPJ</th>
                    <th>Total Persentase</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instansiData as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data['instansi'] }}</td>
                        <td>{{ $data['jumlah_kegiatan'] }}</td>
                        <td>{{ $data['jumlah_proposal'] }}</td>
                        <td>{{ $data['jumlah_lpj'] }}</td>
                        <td>{{ number_format($data['total_persentase'], 2) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="mt-3">Instansi dan Kegiatan yang Belum Mengunggah LPJ</h4>
        <table class="table">
            <thead class="bg-danger">
                <tr>
                    <th>Nama Instansi</th>
                    <th>Nama Kegiatan</th>
                    <th>Status LPJ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatanTanpaLpj as $data)
                    <tr>
                        <td>{{ $data['nama_instansi'] }}</td>
                        <td>{{ $data['nama_kegiatan'] }}</td>
                        <td>{{ $data['status_lpj'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="footer">
        <p>Laporan ini dicetak dari: {{ $url }}</p>
        <p><strong>filter:</strong>
            Tahun Mulai = {{ $tahunMulai }}, Tahun Akhir = {{ $tahunAkhir }}.</p>
    </div>
</body>

</html>
