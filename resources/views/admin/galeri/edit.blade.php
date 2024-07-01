@extends('admin.layouts.main')

@push('title')
    Edit Galeri
@endpush

@push('css')
@endpush

@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto ">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1 before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
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
                    <form action="{{ route('data-galeri.update', $dataGaleri->id) }}" method="POST"
                        enctype="multipart/form-data" id="editGaleriForm">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="inline-block mb-2 text-base font-medium">Judul <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="judul" id="judul"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                value="{{ old('judul', $dataGaleri->judul) }}">
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="inline-block mb-2 text-base font-medium">Gambar <span
                                    class="text-red-500">*</span></label>
                            <input type="file" name="gambar" id="gambar"
                                class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                        </div>

                        <div class="mb-3">
                            <img src="{{ asset('uploads/galeri/foto/' . old('gambar', $dataGaleri->gambar)) }}"
                                id="currentImage" alt="Gambar Saat Ini" class="img-fluid max-w-full h-auto"
                                style="width: 300px; height: auto;">
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
        <script>
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

            // Update current image preview when a new file is selected
            document.getElementById('gambar').addEventListener('change', function(event) {
                const [file] = event.target.files;
                if (file) {
                    document.getElementById('currentImage').src = URL.createObjectURL(file);
                }
            });
        </script>
    @endpush
