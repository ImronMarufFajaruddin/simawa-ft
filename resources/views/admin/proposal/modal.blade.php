{{-- Modal Tambah Proposal --}}
<div id="modalAdd" modal-center="" data-modal-backdrop="modalAdd"
    class="fixed flex flex-col hidden transition-all
    duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
    <div class="w-screen md:w-[40rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
            <h5 class="text-16">Tambah Data</h5>
            <button data-modal-close="modalAdd"
                class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500 dark:text-zink-200 dark:hover:text-red-500"><i
                    data-lucide="x" class="size-5"></i></button>
        </div>

        <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
            <form action="{{ route('data-proposal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="kegiatan_id" class="inline-block mb-2 text-base font-medium">Kegiatan</label>
                    <select id="kegiatan_id" name="kegiatan_id"
                        class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                        <option selected="">---Pilih Kegiatan---</option>
                        @foreach ($dataKegiatan as $kegiatan)
                            @if (Gate::allows('superadmin-only') || $kegiatan->user_id == Auth::id())
                                <option value="{{ $kegiatan->id }}">{{ $kegiatan->nama_kegiatan }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label for="dokumen" class="inline-block mb-2 text-base font-medium">Upload Proposal</label>
                    <div>
                        <input type="file" id="dokumen" name="dokumen"
                            class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                    </div>
                </div><!--end col-->

                <div class="mb-3">
                    <label for="dokumen_lainnya" class="inline-block mb-2 text-base font-medium">Dokumen Lainnya</label>
                    <div>
                        <input type="file" id="dokumen_lainnya" name="dokumen_lainnya"
                            class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                    </div>
                </div><!--end col-->

                <div
                    class="flex p-2 justify-end justify-items-center mt-auto border-t border-slate-200 dark:border-zink-500">
                    {{-- <h5 class="text-16">Modal Footer</h5> --}}
                    <button type="button" data-modal-close="modalAdd"
                        class="me-3 text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20">Close
                        <i class="align-baseline ltr:pl-1 rtl:pr-1 ri-close-line"></i></button>
                    <button type="submit"
                        class="text-white bg-custom-500 btn hover:text-white hover:bg-custom-600 focus:text-white focus:bg-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:ring active:ring-custom-100 dark:bg-red-custom500/20 dark:text-white-500 dark:hover:bg-custom-500 dark:hover:text-white dark:focus:bg-custom-500 dark:focus:text-white dark:active:bg-custom-500 dark:active:text-white dark:ring-custom-400/20">
                        Simpan
                        <i class="align-baseline ltr:pl-1 rtl:pr-1 ri-check-fill"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal Tambah Proposal End --}}


<!-- Modal Tambah Komentar -->
@foreach ($dataProposal as $data)
    <div id="modalTambahKomentar{{ $data->id }}"
        class="fixed hidden z-drawer inset-0 flex items-center justify-center p-4">
        <div class="w-screen md:w-[40rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <h5 class="text-16">Edit Data</h5>
                <button data-modal-close="modalEdit{{ $data->id }}"
                    class="text-slate-500 hover:text-red-500 dark:text-zink-200 dark:hover:text-red-500">
                    <i data-lucide="x" class="size-4"></i>
                </button>
            </div>

            <div class="max-h-[calc(10vh-300px)] p-4 overflow-y-auto">
                <form action="{{ route('proposal.tambahKomentar', $data->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="komentar" class="inline-block mb-2 text-base font-medium">Tambah Komentar</label>
                        <textarea name="komentar" id="komentar"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"></textarea>
                    </div>


                    <div class="flex justify-end mt-auto border-t border-slate-200 dark:border-zink-500 p-2">
                        <button type="button" data-modal-close="modalTambahKomentar{{ $data->id }}"
                            class="text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 me-3">Close
                            <i class="ri-close-line"></i></button>
                        <button type="submit"
                            class="ml-3 text-white bg-custom-500 btn hover:bg-custom-600 focus:bg-custom-600">Simpan
                            <i class="ri-check-fill"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@foreach ($dataProposal as $data)
    <div id="modalEdit{{ $data->id }}" modal-center="" data-modal-backdrop="modalEdit{{ $data->id }}"
        class="fixed flex flex-col hidden transition-all
    duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[40rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <h5 class="text-16">Tambah Data</h5>
                <button data-modal-close="modalEdit{{ $data->id }}"
                    class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500 dark:text-zink-200 dark:hover:text-red-500"><i
                        data-lucide="x" class="size-5"></i></button>
            </div>

            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <form action="{{ route('data-proposal.update', $data->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kategori_nama" class="inline-block mb-2 text-base font-medium">Kegiatan<span
                                class="text-red-500">*</span></label>

                        <select id="kegiatan_id" name="kegiatan_id"
                            class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                            @error('kegiatan_id') is-invalid @enderror">
                            <option selected="">---Pilih Kategori---</option>
                            @foreach ($dataKegiatan as $kegiatan)
                                @if (Gate::allows('superadmin-only') || $kegiatan->user_id == Auth::id())
                                    <option value="{{ $kegiatan->id }}"
                                        {{ $data->kegiatan_id == $kegiatan->id ? 'selected' : '' }}>
                                        {{ $kegiatan->nama_kegiatan }}</option>
                                @endif
                            @endforeach
                        </select>

                        @error('kategori_nama')
                            <div
                                class="flex gap-1 px-1 py-1 mb-2 text-xs text-red-500 border border-red-200 rounded-md md:items-center bg-red-50 dark:bg-red-400/20 dark:border-red-500/50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" data-lucide="alert-circle"
                                    class="lucide lucide-alert-circle h-4">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12"></line>
                                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                </svg> <span class="font-bold">Error</span> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="dokumen" class="inline-block mb-2 text-base font-medium">Upload Proposal</label>
                        <input type="file" id="dokumen" name="dokumen"
                            class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 
                            @error('dokumen') is-invalid @enderror"
                            value="{{ old('dokumen') }}" autofocus>

                        @error('dokumen')
                            <div
                                class="flex gap-1 px-1 py-1 mb-2 text-xs text-red-500 border border-red-200 rounded-md md:items-center bg-red-50 dark:bg-red-400/20 dark:border-red-500/50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" data-lucide="alert-circle"
                                    class="lucide lucide-alert-circle h-4">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12"></line>
                                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                </svg> <span class="font-bold">Error</span> {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="dokumen_lainnya" class="inline-block mb-2 text-base font-medium">Dokumen
                            Lainnya</label>
                        <input type="file" id="dokumen_lainnya" name="dokumen_lainnya"
                            class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 
                            @error('dokumen_lainnya') is-invalid @enderror"
                            value="{{ old('dokumen_lainnya') }}" autofocus>

                        @error('dokumen_lainnya')
                            <div
                                class="flex gap-1 px-1 py-1 mb-2 text-xs text-red-500 border border-red-200 rounded-md md:items-center bg-red-50 dark:bg-red-400/20 dark:border-red-500/50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" data-lucide="alert-circle"
                                    class="lucide lucide-alert-circle h-4">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12"></line>
                                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                </svg> <span class="font-bold">Error</span> {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div
                        class="flex p-2 justify-end justify-items-center mt-auto border-t border-slate-200 dark:border-zink-500">
                        {{-- <h5 class="text-16">Modal Footer</h5> --}}
                        <button type="button" data-modal-close="modalEdit{{ $data->id }}"
                            class="me-3 text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20">Close
                            <i class="align-baseline ltr:pl-1 rtl:pr-1 ri-close-line"></i></button>
                        <button type="submit"
                            class="text-white bg-custom-500 btn hover:text-white hover:bg-custom-600 focus:text-white focus:bg-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:ring active:ring-custom-100 dark:bg-red-custom500/20 dark:text-white-500 dark:hover:bg-custom-500 dark:hover:text-white dark:focus:bg-custom-500 dark:focus:text-white dark:active:bg-custom-500 dark:active:text-white dark:ring-custom-400/20">
                            Simpan
                            <i class="align-baseline ltr:pl-1 rtl:pr-1 ri-check-fill"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach


@foreach ($dataProposal as $data)
    <!-- Modal Edit -->
    <div id="modalEdit{{ $data->id }}"
        class="fixed hidden z-drawer inset-0 flex items-center justify-center p-4">
        <div class="w-screen md:w-[40rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <h5 class="text-16">Edit Data</h5>
                <button data-modal-close="modalEdit{{ $data->id }}"
                    class="text-slate-500 hover:text-red-500 dark:text-zink-200 dark:hover:text-red-500">
                    <i data-lucide="x" class="size-4"></i>
                </button>
            </div>

            <div class="max-h-[calc(10vh-300px)] p-4 overflow-y-auto">
                <form action="{{ route('data-proposal.update', $data->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="kegiatan_id" class="inline-block mb-2 text-base font-medium">Kegiatan</label>
                        <select id="kegiatan_id" name="kegiatan_id"
                            class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            <option selected="">---Pilih Kategori---</option>
                            @foreach ($dataKegiatan as $kegiatan)
                                @if (Gate::allows('superadmin-only') || $kegiatan->user_id == Auth::id())
                                    <option value="{{ $kegiatan->id }}"
                                        {{ $data->kegiatan_id == $kegiatan->id ? 'selected' : '' }}>
                                        {{ $kegiatan->nama_kegiatan }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dokumen" class="inline-block mb-2 text-base font-medium">Upload Proposal</label>
                        <div>
                            <input type="file" id="dokumen" name="dokumen"
                                class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                        </div>
                    </div><!--end col-->

                    <div class="flex justify-end mt-auto border-t border-slate-200 dark:border-zink-500 p-2">
                        <button type="button" data-modal-close="modalEdit{{ $data->id }}"
                            class="text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 me-3">Close
                            <i class="ri-close-line"></i></button>
                        <button type="submit"
                            class="ml-3 text-white bg-custom-500 btn hover:bg-custom-600 focus:bg-custom-600">Simpan
                            <i class="ri-check-fill"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#komentar'), {
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
