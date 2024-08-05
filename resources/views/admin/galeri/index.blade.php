@extends('admin.layouts.main')

@push('title')
    Galeri
@endpush

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-container .select2-selection--single {
            height: 38px;
            border: 1px solid #007bff;
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            display: flex;
            align-items: center;
            background-color: white;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.75rem;
            display: flex;
            align-items: center;
            color: #4b5563;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px;
            display: flex;
            align-items: center;
            margin-right: 0.5rem;
            color: #007bff;
        }

        /* Gaya untuk dropdown menu */
        .select2-dropdown {
            background-color: white;
            border-radius: 0.375rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #007bff;
            margin-top: 0.25rem;
        }
    </style>
@endpush

@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto ">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Tables</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Galeri
                    </li>
                </ul>
            </div>

            @if ($errors->any())
                <div class="flex mb-2 gap-3 p-4 text-sm text-red-500 rounded-md bg-red-50 dark:bg-red-400/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        data-lucide="alert-triangle"
                        class="lucide lucide-alert-triangle inline-block size-4 mt-0.5 shrink-0">
                        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                        <path d="M12 9v4"></path>
                        <path d="M12 17h.01"></path>
                    </svg>
                    <div>
                        <h6 class="mb-1">Ada kesalahan pada input anda!</h6>
                        <ul class="ml-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="mb-3 flex items-center">
                        <h6 class="mb-4 text-xl grow">Galeri</h6>
                        <!--Tabel-->
                    </div>

                    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                        <div class="grid grid-cols-1 2xl:grid-cols-12 gap-x-5 ">
                            <div class="2xl:col-span-9">
                                <div class="flex flex-wrap items-center gap-2">
                                    <div class="mb-3 grow">
                                        <select id="judulFilter" class="form-control ">
                                            <option value="">Semua data</option>
                                            @foreach ($judulGaleri as $judul)
                                                <option value="{{ $judul }}">{{ $judul }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="flex gap-2 shrink-0 items-center">
                                        <a type="button" href="{{ route('data-galeri.create') }}"
                                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" data-lucide="plus"
                                                class="lucide lucide-plus inline-block size-4">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5v14"></path>
                                            </svg> <span class="align-middle">Tambah Data</span></a>
                                        {{-- <button type="button" id="listView"
                                            class="flex items-center justify-center w-[37.5px] h-[37.5px] p-0 text-sky-500 btn bg-sky-100 hover:text-white hover:bg-sky-600 focus:text-white focus:bg-sky-600 [&amp;.active]:text-white [&amp;.active]:bg-sky-600 dark:bg-sky-500/20 dark:text-sky-400 dark:hover:bg-sky-500 dark:hover:text-white dark:focus:bg-sky-500 dark:focus:text-white dark:[&amp;.active]:bg-sky-500 dark:[&amp;.active]:text-white dark:ring-sky-400/20"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" data-lucide="list"
                                                class="lucide lucide-list size-4">
                                                <line x1="8" x2="21" y1="6" y2="6"></line>
                                                <line x1="8" x2="21" y1="12" y2="12"></line>
                                                <line x1="8" x2="21" y1="18" y2="18"></line>
                                                <line x1="3" x2="3.01" y1="6" y2="6"></line>
                                                <line x1="3" x2="3.01" y1="12" y2="12"></line>
                                                <line x1="3" x2="3.01" y1="18" y2="18"></line>
                                            </svg></button>
                                        <button type="button" id="gridView"
                                            class="flex items-center justify-center w-[37.5px] h-[37.5px] p-0 text-sky-500 btn bg-sky-100 hover:text-white hover:bg-sky-600 focus:text-white focus:bg-sky-600 [&amp;.active]:text-white [&amp;.active]:bg-sky-600 dark:bg-sky-500/20 dark:text-sky-400 dark:hover:bg-sky-500 dark:hover:text-white dark:focus:bg-sky-500 dark:focus:text-white dark:[&amp;.active]:bg-sky-500 dark:[&amp;.active]:text-white dark:ring-sky-400/20 active"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" data-lucide="layout-grid"
                                                class="lucide lucide-layout-grid size-4">
                                                <rect width="7" height="7" x="3" y="3" rx="1"></rect>
                                                <rect width="7" height="7" x="14" y="3" rx="1"></rect>
                                                <rect width="7" height="7" x="14" y="14" rx="1"></rect>
                                                <rect width="7" height="7" x="3" y="14" rx="1"></rect>
                                            </svg></button> --}}
                                    </div>
                                </div>

                                <div id="galeriContent">
                                    <div class="grid grid-cols-1 mt-5 md:grid-cols-2 [&.gridView]:grid-cols-1 xl:grid-cols-4 group [&.gridView]:xl:grid-cols-1 gap-x-5"
                                        id="cardGridView">
                                        @foreach ($dataGaleri as $data)
                                            <div class="card md:group-[.gridView]:flex relative">
                                                <div class="block overflow-hidden ">
                                                    <div
                                                        class="mb-2 group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md w-full">
                                                        <img src="{{ asset('uploads/galeri/foto/' . $data->gambar) }}"
                                                            alt=""
                                                            class="transition-transform duration-500 ease-in-out group-hover/card:scale-105 rounded-t-md">
                                                    </div>
                                                </div>

                                                <div
                                                    class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-1 group-[.gridView]:grow">

                                                    <div class="flex items-center text-slate-500 dark:text-zink-200">
                                                        <div class="mr-1 text-custom-500 shrink-0 text-15">
                                                            <i class="ri-pencil-line"></i>
                                                        </div>
                                                        <h6>{{ $data->judul }}</h6>
                                                    </div>

                                                    <div class="flex items-center text-slate-500 dark:text-zink-200">
                                                        <div class="mr-1 text-custom-500 shrink-0 text-15">
                                                            <i class="ri-time-fill"></i>
                                                        </div>
                                                        <p>{{ $data->created_at }}</p>
                                                    </div>

                                                    @if (Gate::allows('superadmin-only'))
                                                        <div class="flex items-center text-slate-500 dark:text-zink-200">
                                                            <div class="mr-1 text-custom-500 shrink-0 text-15">
                                                                <i class="ri-user-3-fill"></i>
                                                            </div>
                                                            <p>{{ $data->user->name }}</p>
                                                        </div>
                                                    @endif
                                                    <div
                                                        class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                                        <div class="relative float-right dropdown w-full">
                                                            <button
                                                                class="flex items-center justify-center w-full h-[38.39px] dropdown-toggle p-0 text-green-500 btn bg-green-100 hover:text-white hover:bg-green-600 focus:text-white focus:bg-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:ring active:ring-green-100 dark:bg-green-500/20 dark:text-green-400 dark:hover:bg-green-500 dark:hover:text-white dark:focus:bg-green-500 dark:focus:text-white dark:active:bg-green-500 dark:active:text-white dark:ring-green-400/20"
                                                                id="productList1" data-bs-toggle="dropdown"
                                                                fdprocessedid="w8is77">
                                                                <p>Action</p>
                                                            </button>
                                                            <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu w-full dark:bg-zink-600"
                                                                aria-labelledby="productList1">
                                                                <li>
                                                                    <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                        href="{{ route('data-galeri.edit', $data->id) }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            data-lucide="file-edit"
                                                                            class="lucide lucide-file-edit inline-block w-3 h-3 ltr:mr-1 rtl:ml-1">
                                                                            <path
                                                                                d="M4 13.5V4a2 2 0 0 1 2-2h8.5L20 7.5V20a2 2 0 0 1-2 2h-5.5">
                                                                            </path>
                                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                                            <path
                                                                                d="M10.42 12.61a2.1 2.1 0 1 1 2.97 2.97L7.95 21 4 22l.99-3.95 5.43-5.44Z">
                                                                            </path>
                                                                        </svg>
                                                                        <span class="align-middle">Edit</span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <form
                                                                        action="{{ route('data-galeri.destroy', $data->id) }}"
                                                                        method="POST" id="deleteForm{{ $data->id }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <a type="button"
                                                                            onclick="confirmDelete('{{ $data->id }}')"
                                                                            class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                data-lucide="trash-2"
                                                                                class="lucide lucide-trash-2 inline-block w-3 h-3 ltr:mr-1 rtl:ml-1">
                                                                                <path d="M3 6h18"></path>
                                                                                <path
                                                                                    d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6">
                                                                                </path>
                                                                                <path
                                                                                    d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2">
                                                                                </path>
                                                                                <line x1="10" x2="10"
                                                                                    y1="11" y2="17">
                                                                                </line>
                                                                                <line x1="14" x2="14"
                                                                                    y1="11" y2="17">
                                                                                </line>
                                                                            </svg>
                                                                            <span class="align-middle">Hapus</span>
                                                                        </a>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div><!--end grid-->
                                </div>

                                <!--Pagination-->
                                <div class="flex flex-col items-center mb-5 md:flex-row">
                                    <div class="mb-4 grow md:mb-0">
                                        <p class="text-slate-500 dark:text-zink-200">Showing
                                            <b>{{ $dataGaleri->count() }}</b> of <b>{{ $dataGaleri->total() }}</b> Results
                                        </p>
                                    </div>
                                    <ul class="flex flex-wrap items-center gap-2 shrink-0">
                                        @if ($dataGaleri->onFirstPage())
                                            <li>
                                                <a
                                                    class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-400 dark:text-zink-300 cursor-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-chevron-left mr-1 size-4 rtl:rotate-180">
                                                        <path d="m15 18-6-6 6-6"></path>
                                                    </svg> Prev
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $dataGaleri->previousPageUrl() }}"
                                                    class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-chevron-left mr-1 size-4 rtl:rotate-180">
                                                        <path d="m15 18-6-6 6-6"></path>
                                                    </svg> Prev
                                                </a>
                                            </li>
                                        @endif

                                        @foreach ($dataGaleri->getUrlRange(1, $dataGaleri->lastPage()) as $page => $url)
                                            <li>
                                                <a href="{{ $url }}"
                                                    class="inline-flex items-center justify-center w-8 h-8 transition-all duration-150 ease-linear border rounded {{ $dataGaleri->currentPage() == $page ? 'bg-custom-500 text-white' : 'bg-white text-slate-500 dark:bg-zink-700 dark:text-zink-200' }} 
                                                    border-slate-200 dark:border-zink-500 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500">
                                                    {{ $page }}
                                                </a>
                                            </li>
                                        @endforeach

                                        @if ($dataGaleri->hasMorePages())
                                            <li>
                                                <a href="{{ $dataGaleri->nextPageUrl() }}"
                                                    class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500">
                                                    Next <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-chevron-right ml-1 size-4 rtl:rotate-180">
                                                        <path d="m9 18 6-6-6-6"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a
                                                    class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-400 dark:text-zink-300 cursor-auto">
                                                    Next <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-chevron-right ml-1 size-4 rtl:rotate-180">
                                                        <path d="m9 18 6-6-6-6"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div><!--end col-->
                        </div><!--end grid-->
                    </div>
                </div>
            </div>
        </div><!--end card-->
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        function confirmDelete(id) {
            let form = document.getElementById('deleteForm' + id);
            Swal.fire({
                title: 'Apakah anda Yakin?',
                text: "Data akan dihapus secara permanen",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

            let errorMessage = '{{ session('error') }}';
            if (errorMessage !== '') {
                Swal.fire({
                    icon: "error",
                    title: "Ooops!",
                    text: errorMessage,
                    showConfirmButton: true,
                });
            }
        }

        let errorMessage = '{{ session('error') }}';
        if (errorMessage !== '') {
            Swal.fire({
                icon: "error",
                title: "Ooops!",
                text: errorMessage,
                showConfirmButton: true,
            });
        }

        let successMessage = '{{ session('success') }}';
        if (successMessage !== '') {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: successMessage,
                showConfirmButton: false,
                timer: 1500
            });
        }

        $(document).ready(function() {
            // Initialize Select2
            $('#judulFilter').select2();
            // Filter logic
            $('#judulFilter').on('change', function() {
                var selectedTitle = $(this).val().toLowerCase();
                if (selectedTitle) {
                    $('#galeriContent .card').each(function() {
                        var cardTitle = $(this).find('h6').text().toLowerCase();
                        if (cardTitle.includes(selectedTitle)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                } else {
                    $('#galeriContent .card').show();
                }
            });
        });
    </script>
@endpush
