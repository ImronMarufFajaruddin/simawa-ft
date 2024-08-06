@extends('admin.layouts.main')

@push('title')
    Detail Proposal
@endpush

@push('css')
    <style>
        .pdf-viewer {
            width: 100%;
            height: 600px;
            border: 1px solid #ccc;
        }
    </style>
@endpush

@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1 before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#" class="text-slate-400 dark:text-zink-200">Tables</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100 position-end">
                        Laporan Pertanggung Jawaban
                    </li>
                </ul>
            </div>

            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-2xl text-green-500">Detail Laporan Pertanggung Jawaban</h6>
                    <p class="mb-4 text-slate-400">
                        Untuk Melihat preview dengan file .doc, .docx, .xlsx silahkan install
                        extension terlebih dahulu pada
                        browser anda. Berikut link extension yang disarankan, silahkan klik dan install : <br>
                        <code class="text-xs text-custom-500 select-all">
                            <a class="underline text-custom-500" target="_blank"
                                href="https://chromewebstore.google.com/detail/office-editing-for-docs-s/gbkeegbaiigmenfmjfclcdgdpimamgkj">office-editing-for-docs-s</a>
                        </code>.
                    </p>

                    <div class="overflow-x-auto">
                        <table class="w-full">

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700 ">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Penyelenggara :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500 font-semibold">
                                    {{ $dataLpj->user->name }}</td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Kegiatan :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    {{ $dataLpj->kegiatan->nama_kegiatan }}
                                </td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Komentar</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    @if ($dataLpj->komentar)
                                        {!! $dataLpj->komentar !!}
                                    @else
                                        <span>Belum ada komentar</span>
                                    @endif
                                </td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Status</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-semibold leading-none {{ $dataLpj->status == 'menunggu' ? 'text-yellow-600 bg-yellow-200' : ($dataLpj->status == 'revisi' ? 'text-custom-600 bg-custom-200' : ($dataLpj->status == 'ditolak' ? 'text-red-600 bg-red-200' : 'text-green-600 bg-green-200')) }} rounded">{{ $dataLpj->status }}</span>
                                </td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Dokumen Proposal
                                </th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    <a href="{{ asset('dokumen/lpj/' . $dataLpj->dokumen) }}"
                                        download="{{ $dataLpj->dokumen }}" target="_blank">
                                        <span class="text-custom-500 underline">Download</span>
                                    </a>
                                    <br>
                                    <iframe src="{{ asset('dokumen/lpj/' . $dataLpj->dokumen) }}"
                                        class="pdf-viewer w-full h-96 mt-2" frameborder="0">
                                        Your browser does not support PDFs.
                                        <a href="{{ asset('dokumen/lpj/' . $dataLpj->dokumen) }}">Download the PDF</a>
                                    </iframe>
                                </td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Dokumen Lainnya
                                </th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    <a href="{{ asset('dokumen/lpj/lainnya/' . $dataLpj->dokumen_lainnya) }}"
                                        download="{{ $dataLpj->dokumen_lainnya }}" target="_blank">
                                        <span class="text-custom-500 underline">Download</span>
                                    </a>
                                    <br>
                                    <iframe src="{{ asset('dokumen/lpj/lainnya/' . $dataLpj->dokumen_lainnya) }}"
                                        class="pdf-viewer w-full h-96 mt-2" frameborder="0">
                                        Your browser does not support PDFs.
                                        <a href="{{ asset('dokumen/lpj/lainnya/' . $dataLpj->dokumen_lainnya) }}">Download
                                            the PDF</a>
                                    </iframe>
                                </td>
                            </tr>

                        </table>

                        <button type="button" class="bg-slate-500 hover:bg-slate-600 text-white btn mt-6">
                            <a href="{{ route('data-lpj.index') }}">&laquo; Kembali</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection
