@extends('admin.layouts.main')

@push('title')
    Galeri
@endpush

@push('css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview@^4/dist/filepond-plugin-image-preview.css" rel="stylesheet">

    <style>
        .filepond--drop-label {
            color: #534c4c;
        }

        .filepond--label-action {
            text-decoration-color: #babdc0;
        }

        .filepond--panel-root {
            border-radius: 2em;
            background-color: #edf0f4;
            height: 1em;
        }

        .filepond--item-panel {
            background-color: #595e68;
        }

        .filepond--drip-blob {
            background-color: #7f8a9a;
        }

        .filepond--item {
            width: calc(20% - 0.5em);
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
                        <h6 class="mb-4 text-xl grow">Galeri Upload</h6>
                    </div>
                    <form action="{{ route('data-galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" id="gambar" name="gambar" multiple required>
                        </div>

                        <button type="submit"
                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                                class="align-baseline ltr:pr-1 rtl:pl-1 ri-upload-2-line"></i> Upload</button>
                    </form>

                </div>
            </div>
        </div>
    @endsection

    @push('js')
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js">
        </script>
        <script
            src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js">
        </script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);
            const pond = FilePond.create(document.querySelector('input[type="file"]'));

            pond.setOptions({
                storeasfile: true,
                server: {
                    url: '/data-galeri/upload-temporary',
                    process: {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        onload: (response) => {
                            return response;
                        }
                    },
                    revert: {
                        url: '/data-galeri/revert-temporary/{filename}',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        onload: (response) => {
                            return response;
                        }
                    }
                }
            });

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
