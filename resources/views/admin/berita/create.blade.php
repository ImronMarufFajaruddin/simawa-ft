@extends('admin.layouts.main')

@push('title')
    Tambah Berita
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
                    <li class="text-slate-700 dark:text-zink-100">
                        Berita
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
                    <h6 class="mb-1 text-2xl">Tambah Berita</h6>
                    <p class="mb-4 text-slate-500 dark:text-zink-200">Update your photo and personal details here easily.
                    </p>
                    <form action="{{ route('data-berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                            <div class="xl:col-span-12">
                                <label for="judulBerita" class="inline-block mb-2 text-base font-medium">Judul
                                    Berita</label>
                                <input type="text" id="judul" name="judul"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Judul Berita anda">
                            </div><!--end col-->
                            <div class="xl:col-span-6">
                                <label for="slug" class="inline-block mb-2 text-base font-medium">Slug</label>
                                <input type="text" id="slug" name="slug"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Otomastis terisi setelah judul berita ditambahkan" disabled>
                            </div><!--end col-->

                            <div class="xl:col-span-6">
                                <label for="kategori_berita_id"
                                    class="inline-block mb-2 text-base font-medium">Kategori</label>
                                <select id="kategori_berita_id" name="kategori_berita_id"
                                    class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    <option selected="">---Pilih Kategori---</option>
                                    @foreach ($dataKategoriBerita as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->kategori_nama }}</option>
                                    @endforeach
                                </select>
                            </div><!--end col-->

                            <div class="xl:col-span-12">
                                <label for="konten" class="block mb-2 text-base font-medium">Isi Konten Berita</label>
                                <textarea id="konten" name="konten"></textarea>
                            </div><!--end col-->

                            <div class="xl:col-span-6">
                                <label for="gambar" class="inline-block mb-2 text-base font-medium">Upload Gambar</label>
                                <div>
                                    <input type="file" id="gambar" name="gambar"
                                        class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                                </div>
                            </div><!--end col-->
                            <div class="xl:col-span-6">
                                <label for="dokumen" class="inline-block mb-2 text-base font-medium">Upload Dokumen</label>
                                <div>
                                    <input type="file" id="dokumen" name="dokumen"
                                        class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                                </div>
                            </div><!--end col-->

                            <div class="xl:col-span-6">
                                <label for="status" class="inline-block mb-2 text-base font-medium">Status</label>
                                <select id="status" name="status"
                                    class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    <option selected="">---Pilih Status---</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>
                            </div><!--end col-->

                            <div class="xl:col-span-6">
                                <label for="publishDate" class="inline-block mb-2 text-base font-medium">Tanggal
                                    Publikasi</label>
                                <input type="date" id="publishDate" name="tanggal_publish"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 flatpickr-input"
                                    placeholder="Pilih" flatpickr-input readonly>
                            </div><!--end col-->

                            <div class="xl:col-span-12">
                                <div class="flex justify-end mt-6 gap-x-4">
                                    <button type="submit"
                                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Submit</button>
                                    <button type="button"
                                        class="text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20">Cancel</button>
                                </div>
                            </div><!--end col-->
                    </form><!--end form-->
                </div><!--end grid-->
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">Data Berita</h6>
                <!-- Add content here -->
            </div>
        </div><!--end card-->
    </div>
    <!-- container-fluid -->
    </div>
@endsection

@push('js')
    <script>
        flatpickr("#publishDate", {
            dateFormat: "Y-m-d",
            // tambahkan konfigurasi lainnya sesuai kebutuhan
        });
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#konten'), {
                    // Konfigurasi CKEditor
                })
                // .then(editor => {
                //     editor.ui.getEditableElement().parentElement.style.height = '300px';
                // })
                .catch(error => {
                    console.error(error);
                });
            document.getElementById('judul').addEventListener('input', function() {
                var judul = this.value;
                var slug = judul.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
                document.getElementById('slug').setAttribute('placeholder', slug);
            });
        });
    </script>
@endpush
