@extends('admin.layouts.main')

@push('title')
    Statistik Laporan
@endpush

@push('css')
@endpush
@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1 before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#" class="text-slate-400 dark:text-zink-200">Page</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100 position-end">
                        Data Statistik Laporan
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-x-5">
                <!-- Statistik Pertahun -->
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-4 text-xl text-green-500">Statistik Pertahun</h6>

                        <form method="GET" action="{{ route('data-statistik.index') }}">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-5">
                                <div>
                                    <label for="tahun_mulai" class="inline-block mb-2 text-base font-medium">Tahun
                                        Mulai:</label>
                                    <input
                                        class="form-input form-control border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        type="number" id="tahun_mulai" name="tahun_mulai" placeholder="Filter tahun awal"
                                        value="{{ $tahunMulai }}">
                                </div>
                                <div>
                                    <label for="tahun_akhir" class="inline-block mb-2 text-base font-medium">Tahun
                                        Akhir:</label>
                                    <input
                                        class="form-input form-control border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        type="number" id="tahun_akhir" name="tahun_akhir" placeholder="Filter Tahun Akhir"
                                        value="{{ $tahunAkhir }}">
                                </div>
                                <div class="flex items-end gap-1">
                                    <button type="submit"
                                        class="w-20 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                        <span class="align-middle">Filter</span>
                                    </button>

                                    <button type="button" data-tooltip="default" data-tooltip-content="Cetak"
                                        onclick="window.location='{{ route('data-statistik.cetak-pdf', ['tahun_mulai' => $tahunMulai, 'tahun_akhir' => $tahunAkhir]) }}'"
                                        class="flex items-center justify-center size-[37.5px] p-0 text-white btn bg-green-500 border-green-500 hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20">
                                        <i class="ri-printer-line"></i>
                                    </button>

                                    <button type="button" data-tooltip="default" data-tooltip-content="Grafik"
                                        onclick="window.location='{{ route('data-statistik.chart', ['tahun_mulai' => $tahunMulai, 'tahun_akhir' => $tahunAkhir]) }}'"
                                        class="flex items-center justify-center size-[37.5px] p-0 text-white btn bg-sky-400 border-sky-400 hover:text-white hover:bg-sky-500 hover:border-sky-500 focus:text-white focus:bg-sky-500 focus:border-sky-500 focus:ring focus:ring-sky-100 active:text-white active:bg-sky-500 active:border-sky-500 active:ring active:ring-sky-100 dark:ring-sky-400/20">
                                        <i class="ri-pie-chart-2-line"></i>
                                    </button>


                                </div>
                            </div>
                        </form>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <tr class="odd:bg-slate-50 even:bg-white">
                                    <th class="px-3.5 py-2.5 font-semibold border">Kegiatan:</th>
                                    <td class="px-3.5 py-2.5 border">{{ $totalKegiatan }}</td>
                                </tr>
                                <tr class="odd:bg-slate-50 even:bg-white">
                                    <th class="px-3.5 py-2.5 font-semibold border">Proposal masuk:</th>
                                    <td class="px-3.5 py-2.5 border">{{ $totalProposal }}</td>
                                </tr>
                                <tr class="odd:bg-slate-50 even:bg-white">
                                    <th class="px-3.5 py-2.5 font-semibold border">LPJ masuk:</th>
                                    <td class="px-3.5 py-2.5 border">{{ $totalLpj }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Peringkat -->
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-4 text-xl text-green-500">Peringkat</h6>
                        {{-- <h6 class="text-15 text-green-500 ">Peringkat</h6> --}}

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="text-left">
                                    <tr>
                                        <th class="px-3.5 py-2.5 font-semibold border-b">Peringkat</th>
                                        <th class="px-3.5 py-2.5 font-semibold border-b">Instansi</th>
                                        <th class="px-3.5 py-2.5 font-semibold border-b">Jumlah Kegiatan</th>
                                        {{-- <th class="px-3.5 py-2.5 font-semibold border-b">Proposal Terbanyak</th>
                                        <th class="px-3.5 py-2.5 font-semibold border-b">LPJ Terbanyak</th> --}}
                                        <th class="px-3.5 py-2.5 font-semibold border-b">Keaktifan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instansiData->take(5) as $index => $data)
                                        <tr class="even:bg-slate-50 hover:bg-slate-50">
                                            <td class="px-3.5 py-2.5 border-y">{{ $index + 1 }}</td>
                                            <td class="px-3.5 py-2.5 border-y">{{ $data['instansi'] }}</td>
                                            <td class="px-3.5 py-2.5 border-y">{{ $data['jumlah_kegiatan'] }}</td>
                                            {{-- <td class="px-3.5 py-2.5 border-y">{{ $data['jumlah_proposal'] }}</td>
                                            <td class="px-3.5 py-2.5 border-y">{{ $data['jumlah_lpj'] }}</td> --}}
                                            <td class="px-3.5 py-2.5 border-y">
                                                {{ number_format($data['persentase_keaktifan'], 2) }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h6 class="mb-3 text-15">Semua Statistik Instansi </h6>
                    <table id="dataTable" class="w-full bordered group" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Instansi</th>
                                <th>Kegiatan</th>
                                <th>Proposal</th>
                                <th>Lpj</th>
                                <th>Persentase Keaktifan</th>
                                <th>Action</th>
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
                                    <td>{{ number_format($data['persentase_keaktifan'], 2) }}%</td>
                                    <td>
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="" data-tooltip="default" data-tooltip-content="Detail"
                                                class="flex items-center justify-center size-[37.5px] p-0 text-white btn bg-green-500 border-green-500 hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20">
                                                <i class="ri-eye-fill"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--end card-->

        </div>
        <!-- container-fluid -->
    </div>
@endsection

@push('js')
@endpush
