@extends('admin.layouts.main')

@push('title')
    Detail Instansi
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
                        Detail Instansi
                    </li>
                </ul>
            </div>

            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-2xl text-green-500">Detail Instansi</h6>

                    <div class="overflow-x-auto">
                        <table class="w-full">

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700 ">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Kategori :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500 font-semibold">
                                    {{ $dataInstansi->kategoriInstansi->kategori_nama }}</td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Nama Resmi :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    {{ $dataInstansi->nama_resmi }}
                                </td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700 ">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Nama Singkatan :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    {{ $dataInstansi->nama_singkatan }}</td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Logo :</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    @if ($dataInstansi->logo)
                                        <img src="{{ asset('instansi/logo/' . $dataInstansi->logo) }}" alt="Logo"
                                            style="width: 200px; height: auto;">
                                    @else
                                        <img src="{{ asset('landing-template/assets/img/logo_ormawa/maskot.png') }}"
                                            alt="Logo" style="width: 200px; height: auto;">
                                    @endif
                                </td>
                            </tr>
                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    No. Telp</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    {{ $dataInstansi->no_telp }}
                                </td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Instagram</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    <a href="{{ $dataInstansi->instagram }}" target="__blank"
                                        class="text-custom-500 underline">
                                        {{ $dataInstansi->instagram }}</a>
                                </td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Website</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    @if ($dataInstansi->website_link)
                                        <a href="{{ $dataInstansi->website_link }}" target="__blank"
                                            class="text-custom-500 underline">{{ $dataInstansi->website_link }}</a>
                                    @else
                                        Tidak ada website
                                    @endif
                                </td>
                            </tr>

                            <tr class="odd:bg-slate-50 even:bg-white dark:odd:bg-zink-600 dark:even:bg-zink-700">
                                <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                    Sejarah</th>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    {!! $dataInstansi->sejarah !!}
                                </td>
                            </tr>

                        </table>

                        <button type="button" class="bg-slate-500 hover:bg-slate-600 text-white btn mt-6"><a
                                href="{{ route('data-instansi.index') }}">&laquo; Kembali</a></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection
