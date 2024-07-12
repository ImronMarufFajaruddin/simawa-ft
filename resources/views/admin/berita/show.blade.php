@extends('admin.layouts.main')

@push('title')
    Detail Berita
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
                        <a href="#" class="text-slate-400 dark:text-zink-200">Tables</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100 position-end">
                        Berita
                    </li>
                </ul>
            </div>

            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-2xl text-green-500">Detail Berita</h6>

                    <div class="overflow-x-auto">
                        <table class="w-full">

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700 ">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Author :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500 font-semibold">
                                    {{ $dataBerita->user->name }}</td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Kategori Berita :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    {{ $dataBerita->kategoriBerita->kategori_nama }}
                                </td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700 ">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Judul :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    {{ $dataBerita->judul }}</td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Slug :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    {{ $dataBerita->slug }}
                                </td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Konten</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    {!! $dataBerita->konten !!}
                                </td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Gambar</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    <img src="{{ asset('uploads/berita/foto/' . $dataBerita->gambar) }}" alt="gambar"
                                        style="width:50%">
                                </td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Dokumen :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    <a href="{{ asset('uploads/berita/dokumen/' . $dataBerita->dokumen) }} "
                                        download="{{ $dataBerita->dokumen }}" target="_blank"><span
                                            class="text-custom-500 underline">Download</span></a>
                                </td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Tanggal Dibuat :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    {{ $dataBerita->created_at }}
                                </td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Tanggal Publikasi :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    {{ $dataBerita->tanggal_publish }}
                                </td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Status :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    @if ($dataBerita->status == 'Draft')
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium rounded border bg-red-100 border-transparent text-red-500 dark:bg-red-500/20 dark:border-transparent"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" data-lucide="x-circle"
                                                class="lucide lucide-x-circle size-3 ltr:mr-1 rtl:ml-1">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="m15 9-6 6"></path>
                                                <path d="m9 9 6 6"></path>
                                            </svg> {{ $dataBerita->status }}</span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" data-lucide="check-circle-2"
                                                class="lucide lucide-check-circle-2 size-3 ltr:mr-1 rtl:ml-1">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="m9 12 2 2 4-4"></path>
                                            </svg> {{ $dataBerita->status }}</span>
                                    @endif
                                </td>
                            </tr>

                        </table>

                        <button type="button" class="bg-custom-500 hover:bg-custom-600 text-white btn mt-6"><a
                                href="{{ route('data-berita.index') }}">Kembali</a></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection
