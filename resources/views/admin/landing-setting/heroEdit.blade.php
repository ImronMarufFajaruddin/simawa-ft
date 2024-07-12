@extends('admin.layouts.main')

@push('title')
    Hero Edit
@endpush

@push('css')
    <style type="text/css">
        .ck-editor__editable_inline {
            height: 200px;
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
                    <li class="text-slate-700 dark:text-zink-100">
                        Hero Setting
                    </li>
                </ul>
            </div>


            @if ($errors->any())
                <div class="flex mb-2 gap-3 p-4 text-sm text-red-500 rounded-md bg-red-50 dark:bg-red-400/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                    <h6 class="mb-4 text-2xl">Hero Setting</h6>
                    {{-- <p class="mb-4 text-slate-500 dark:text-zink-200">Update your photo and personal details here easily. --}}
                    </p>
                    <form action="{{ route('data-landings.heroUpdate', $dataHero->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="xl:col-span-6">
                                <label for="heroTitle" class="inline-block mb-2 text-base font-medium">Hero Title</label>
                                <input type="text" id="title" name="title"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('title', $dataHero->title) }}">
                            </div><!--end col-->

                            <div class="xl:col-span-6">
                                <label for="logo" class="inline-block mb-2 text-base font-medium">Upload Logo</label>
                                <div>
                                    <input type="file" id="logo" name="logo"
                                        class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                                        value="{{ old('logo', $dataHero->logo) }}">
                                </div>
                            </div><!--end col-->

                            <div class="xl:col-span-12">
                                <label for="heroDeskripsi" class="block mb-2 text-base font-medium">Isi Deskripsi
                                    Hero</label>
                                <textarea id="heroDeskripsi" name="hero_deskripsi">
                                  {{ old('hero_deskripsi', $dataHero->hero_deskripsi) }}
                                </textarea>
                            </div><!--end col-->


                            <div class="xl:col-span-12 mt-3">
                                <h5 class="mb-1 text-2xl">Tentang Kami Setting</h5>
                            </div>
                            <div class="xl:col-span-6">
                                <label for="heroTitle" class="inline-block mb-2 text-base font-medium">Tentang Kami
                                    Title</label>
                                <input type="text" id="about_title" name="about_title"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    value="{{ old('about_title', $dataHero->about_title) }}">
                            </div><!--end col-->

                            <div class="xl:col-span-6">
                                <label for="foto" class="inline-block mb-2 text-base font-medium">Upload Foto</label>
                                <div>
                                    <input type="file" id="about_foto" name="about_foto"
                                        class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                                        value="{{ old('about_foto', $dataHero->about_foto) }}">
                                </div>
                            </div><!--end col-->

                            <div class="xl:col-span-12">
                                <label for="aboutDeskripsi" class="block mb-2 text-base font-medium">Isi Deskripsi Tentang
                                    Kami</label>
                                <textarea id="aboutDeskripsi" name="about">
                                  {{ old('about', $dataHero->about) }}
                                </textarea>
                            </div><!--end col-->


                            <div class="xl:col-span-12">
                                <div class="flex justify-end mt-6 gap-x-4">
                                    <button type="submit"
                                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Submit</button>
                                    <a type="button" href="{{ route('data-landings.heroIndex') }}"
                                        class="text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20">Cancel</a>
                                </div>
                            </div><!--end col-->
                    </form><!--end form-->
                </div><!--end grid-->
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#heroDeskripsi'), {
                    toolbar: ['undo', 'redo', '|', 'heading', '|', 'bold', 'italic', 'link', 'bulletedList',
                        'numberedList',
                        'blockQuote', '|', 'fontfamily', 'fontsize', 'fontColor', '|', 'outdent', 'indent',
                    ],
                })

                .catch(error => {
                    console.error(error);
                });
        });
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#aboutDeskripsi'), {
                    toolbar: ['undo', 'redo', '|', 'heading', '|', 'bold', 'italic', 'link', 'bulletedList',
                        'numberedList',
                        'blockQuote', '|', 'fontfamily', 'fontsize', 'fontColor', '|', 'outdent', 'indent',
                    ],
                })

                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
