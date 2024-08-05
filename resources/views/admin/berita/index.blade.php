@extends('admin.layouts.main')

@push('title')
    Berita
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
                        <h6 class="mb-4 text-xl grow">Data Berita</h6>
                        <div class="mb-3">
                            <a type="button" href="{{ route('data-berita.create') }}"
                                class=" text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:focus:ring-custom-400/20">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" data-lucide="plus"
                                    class="lucide lucide-plus inline-block size-4">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5v14"></path>
                                </svg><span class="align-middle">
                                    Tambah Data</span>
                            </a>
                        </div>
                    </div>
                    <table id="dataTable" class="w-full bordered group" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Author</th>
                                <th>Kategori Berita</th>
                                <th>Judul</th>
                                {{-- <th>Slug</th>
                                <th>Konten</th> --}}
                                <th>Gambar</th>
                                <th>Dokumen</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($dataBerita as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->kategoriBerita->kategori_nama }}</td>
                                    <td>{{ $data->judul }}</td>
                                    {{-- <td>{{ $data->slug }}</td>
                                    <td>{{ Str::limit($data->konten, 50) }}</td> --}}
                                    {{-- <td>{{ $data->gambar }}</td> --}}


                                    <td>
                                        @if ($data->gambar)
                                            <img src="{{ asset('/uploads/berita/foto/' . $data->gambar) }}" alt="gambar"
                                                style="width: 100px; height: auto;">
                                        @else
                                            <img src="{{ asset('admin-template/assets/images/avatar-1.png') }}"
                                                alt="gambar" style="width: 50px; height: auto;">
                                        @endif

                                    </td>
                                    <td>
                                        <div class="flex items-center justify-center">
                                            @if ($data->dokumen)
                                                <a href="/uploads/berita/dokumen/{{ $data->dokumen }}" type="button"
                                                    class="flex items-center text-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-sky-500 btn bg-sky-100 hover:text-white hover:bg-sky-600 focus:text-white focus:bg-sky-600 focus:ring focus:ring-sky-100 active:text-white active:bg-sky-600 active:ring active:ring-sky-100 dark:bg-sky-500/20 dark:text-sky-400 dark:hover:bg-sky-500 dark:hover:text-white dark:focus:bg-sky-500 dark:focus:text-white dark:active:bg-sky-500 dark:active:text-white dark:ring-sky-400/20">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            @else
                                                <span>No Document</span>
                                            @endif
                                        </div>
                                    </td>

                                    {{-- <td>
                                        @if ($data->dokumen)
                                            <a href="{{ asset('uploads/berita/dokumen/' . $data->dokumen) }}" download>
                                                <i class="ri-file-download-line"></i>
                                            </a>
                                        @else
                                            <span>No Document</span>
                                        @endif
                                    </td> --}}
                                    {{-- <td>{{ $data->dokumen }}</td> --}}

                                    @if ($data->status == 'Draft')
                                        <td><span
                                                class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium rounded border bg-red-100 border-transparent text-red-500 dark:bg-red-500/20 dark:border-transparent"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    data-lucide="x-circle"
                                                    class="lucide lucide-x-circle size-3 ltr:mr-1 rtl:ml-1">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <path d="m15 9-6 6"></path>
                                                    <path d="m9 9 6 6"></path>
                                                </svg> {{ $data->status }}</span></td>
                                        {{-- <td class="text-red-500">{{ $data->status }}</td> --}}
                                    @else
                                        <td>
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    data-lucide="check-circle-2"
                                                    class="lucide lucide-check-circle-2 size-3 ltr:mr-1 rtl:ml-1">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <path d="m9 12 2 2 4-4"></path>
                                                </svg> {{ $data->status }}</span>
                                        </td>
                                    @endif
                                    <td>
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('data-berita.show', $data->id) }}" data-tooltip="default"
                                                data-tooltip-content="Lihat"
                                                class="flex items-center justify-center size-[37.5px] p-0 text-white btn bg-green-500 border-green-500 hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20">
                                                <i class="ri-eye-fill"></i>
                                            </a>

                                            <a data-tooltip="default" data-tooltip-content="Edit"
                                                href="{{ route('data-berita.edit', $data->id) }}"
                                                class="flex items-center justify-center size-[37.5px] p-0 text-white btn bg-yellow-500 border-yellow-500 hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/20">
                                                <i class="ri-edit-2-fill"></i>
                                            </a>

                                            <form action="{{ route('data-berita.destroy', $data->id) }}" method="POST"
                                                id="deleteForm{{ $data->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" data-tooltip="default" data-tooltip-content="Hapus"
                                                    class="flex items-center justify-center size-[37.5px] p-0 text-white btn bg-red-500 border-red-500 hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">
                                                    <i class="ri-delete-bin-fill"
                                                        onclick="confirmDelete('{{ $data->id }}')"></i>
                                                </button>
                                            </form>
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
    <script>
        function confirmDelete(id) {
            let form = document.getElementById('deleteForm' + id);
            Swal.fire({
                title: 'Apakah anda yakin?',
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
        }

        let successMessage = '{{ session('success') }}';
        if (successMessage) {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: successMessage,
                showConfirmButton: false,
                timer: 1500
            });
        }

        let errorMessage = '{{ session('error') }}';
        if (errorMessage) {
            Swal.fire({
                icon: "error",
                title: "Ooops!",
                text: errorMessage,
                showConfirmButton: true,
            });
        }
    </script>
@endpush
