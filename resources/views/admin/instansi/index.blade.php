@extends('admin.layouts.main')

@push('title')
    Data || Instansi
@endpush

@push('css')
@endpush

@section('content')
    {{-- DATA KATEGORI --}}
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
                        Datatable
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
                        <h6 class="mb-4 text-xl grow">Data Instansi</h6>
                        <div class="shrink-0">
                            <button data-modal-target="modalAdd" type="button"
                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" data-lucide="plus"
                                    class="lucide lucide-plus inline-block size-4">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5v14"></path>
                                </svg> <span class="align-middle">Tambah Data</span></button>
                        </div>
                    </div>
                    <table id="dataTable" class="bordered group" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Nama Resmi</th>
                                <th>Nama Singkatan</th>
                                <th>Logo</th>
                                <th>No Telp.</th>
                                {{-- <th>Instagram</th>
                                <th>Website</th>
                                <th>Sejarah</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-zink-500">
                            @foreach ($dataInstansi as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->kategoriInstansi->kategori_nama }}</td>
                                    <td>{{ $data->nama_resmi }}</td>
                                    <td>{{ $data->nama_singkatan }}</td>
                                    <td>
                                        @if ($data->logo)
                                            <img src="{{ asset('instansi/logo/' . $data->logo) }}" alt="Logo"
                                                style="width: 100px; height: auto;">
                                        @else
                                            <img src="{{ asset('landing-template/assets/img/logo_ormawa/maskot.png') }}"
                                                alt="Logo" style="width: 80px; height: auto;">
                                        @endif
                                        {{-- <img src="{{ $data->logo }}" alt="Logo" style="width: 50px; height: auto;"> --}}
                                    </td>
                                    <td>{{ $data->no_telp }}</td>
                                    {{-- <td>{{ $data->instagram }}</td>
                                    <td>{{ $data->website_link }}</td>
                                    <td>{{ Str::limit($data->sejarah, 5) }}</td> --}}
                                    {{-- <button type="button" action="{{  }}">Edit</button> --}}

                                    <td
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                        <div class="relative dropdown">
                                            <button id="orderAction1" data-bs-toggle="dropdown"
                                                class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-green-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    data-lucide="more-horizontal"
                                                    class="lucide lucide-more-horizontal size-3">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </button>
                                            <ul class="absolute z-50 py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[5rem] dark:bg-zink-600 hidden"
                                                aria-labelledby="orderAction1" data-popper-placement="bottom-start"
                                                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(682px, 2243.5px, 0px);">


                                                <li>
                                                    <a type="button" href="{{ route('data-instansi.detail', $data->id) }}"
                                                        class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            data-lucide="eye"
                                                            class="lucide eye inline-block size-3 ltr:mr-1 rtl:ml-1">
                                                            <path
                                                                d="M4 13.5V4a2 2 0 0 1 2-2h8.5L20 7.5V20a2 2 0 0 1-2 2h-5.5">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <path
                                                                d="M10.42 12.61a2.1 2.1 0 1 1 2.97 2.97L7.95 21 4 22l.99-3.95 5.43-5.44Z">
                                                            </path>
                                                        </svg>
                                                        <span class="align-justify">Detail </span></a>
                                                </li>

                                                <li>
                                                    <button data-modal-target="modalEdit{{ $data->id }}" type="button"
                                                        action="{{ route('data-instansi.edit', $data->id) }}"
                                                        class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" data-lucide="file-edit"
                                                            class="lucide lucide-file-edit inline-block size-3 ltr:mr-1 rtl:ml-1">
                                                            <path
                                                                d="M4 13.5V4a2 2 0 0 1 2-2h8.5L20 7.5V20a2 2 0 0 1-2 2h-5.5">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <path
                                                                d="M10.42 12.61a2.1 2.1 0 1 1 2.97 2.97L7.95 21 4 22l.99-3.95 5.43-5.44Z">
                                                            </path>
                                                        </svg>
                                                        <span class="align-justify">Edit </span></button>
                                                </li>


                                                <li>
                                                    <form action="{{ route('data-instansi.destroy', $data->id) }}"
                                                        method="POST" id="deleteForm{{ $data->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                            onclick="confirmDelete('{{ $data->id }}')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                data-lucide="trash-2"
                                                                class="lucide lucide-trash-2 inline-block size-3 ltr:mr-1 rtl:ml-1">
                                                                <path d="M3 6h18"></path>
                                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                                <line x1="10" x2="10" y1="11"
                                                                    y2="17"></line>
                                                                <line x1="14" x2="14" y1="11"
                                                                    y2="17"></line>
                                                            </svg>
                                                            <span class="align-middle">Delete</span></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Nama Resmi</th>
                                <th>Nama Singkatan</th>
                                <th>Logo</th>
                                <th>No Telp.</th>
                                {{-- <th>Instagram</th>
                                <th>Website</th>
                                <th>Sejarah</th> --}}
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div><!--end card-->
        </div>
        @include('admin.instansi.modal')
    @endsection
    @push('js')
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
        </script>
    @endpush
