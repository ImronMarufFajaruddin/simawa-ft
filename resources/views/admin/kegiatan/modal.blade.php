{{-- Modal Tmbah --}}
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
            {{-- <h5 class="mb-3 text-16">Modal Content</h5> --}}
            <form action="{{ route('data-kegiatan.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">

                    <div class="xl:col-span-12">
                        <label for="nama_kegiatann" class="inline-block mb-2 text-base font-medium">Nama Kegiatan<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 
                        @error('name') is-invalid @enderror"
                            value="{{ old('nama_kegiatan') }}" autofocus>
                        @error('nama_kegiatan')
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

                    <div class="xl:col-span-6">
                        <label for="tanggal_mulai" class="inline-block mb-2 text-base font-medium">Tanggal Mulai<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="tanggal_mulai" id="tanggal_mulai"
                            class="mb-2 form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            value="{{ old('tanggal_mulai') }}" placeholder="Tanggal Mulai Kegiatan" autofocus>

                        @error('tanggal_mulai')
                            <div
                                class="flex gap-1 px-1 py-1 text-xs text-red-500 border border-red-200 rounded-md md:items-center bg-red-50 dark:bg-red-400/20 dark:border-red-500/50">
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

                    <div class="xl:col-span-6">
                        <label for="tanggal_selesai" class="inline-block mb-2 text-base font-medium">Tanggal
                            Selesai<span class="text-red-500">*</span></label>
                        <input type="text" name="tanggal_selesai" id="tanggal_selesai"
                            class="mb-2 form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            value="{{ old('tanggal_selesai') }}" placeholder="Tanggal Selesai Kegiatan" autofocus>

                        @error('tanggal_selesai')
                            <div
                                class="flex gap-1 px-1 py-1 text-xs text-red-500 border border-red-200 rounded-md md:items-center bg-red-50 dark:bg-red-400/20 dark:border-red-500/50">
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


                </div>

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
@foreach ($dataKegiatan as $data)
    <div id="modalEdit{{ $data->id }}" modal-center="" data-modal-backdrop="modalEdit"
        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[40rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <h5 class="text-16">Tambah Data</h5>
                <button data-modal-close="modalEdit{{ $data->id }}"
                    class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500 dark:text-zink-200 dark:hover:text-red-500"><i
                        data-lucide="x" class="size-5"></i></button>
            </div>

            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <form action="{{ route('data-kegiatan.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                        <div class="xl:col-span-12">
                            <label for="nama_kegiatan" class="inline-block mb-2 text-base font-medium">Nama
                                Kegiatan<span class="text-red-500">*</span></label>
                            <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                                class="mb-2 form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                @error('nama_kegiatan') is-invalid @enderror"
                                value="{{ old('nama_kegiatan', $data->nama_kegiatan) }}" autofocus>
                            @error('nama_kegiatan')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="xl:col-span-6">
                            <label for="tanggal_mulai" class="inline-block mb-2 text-base font-medium">Tanggal
                                Mulai<span class="text-red-500">*</span></label>
                            <input type="text" name="tanggal_mulai" id="tanggal_mulai"
                                class="mb-2 form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 @error('tanggal_mulai') is-invalid @enderror"
                                value="{{ old('tanggal_mulai', $data->tanggal_mulai) }}"
                                placeholder="Tanggal Mulai Kegiatan" autofocus>
                            @error('tanggal_mulai')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="xl:col-span-6">
                            <label for="tanggal_selesai" class="inline-block mb-2 text-base font-medium">Tanggal
                                Selesai<span class="text-red-500">*</span></label>
                            <input type="text" name="tanggal_selesai" id="tanggal_selesai"
                                class="mb-2 form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                @error('tanggal_selesai') is-invalid @enderror"
                                value="{{ old('tanggal_selesai', $data->tanggal_selesai) }}"
                                placeholder="Tanggal Selesai Kegiatan" autofocus>
                            @error('tanggal_selesai')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div
                        class="flex p-2 justify-end justify-items-center mt-auto border-t border-slate-200 dark:border-zink-500">
                        <button type="button" data-modal-close="modalEdit{{ $data->id }}"
                            class="me-3 text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600">Close</button>
                        <button type="submit"
                            class="text-white bg-custom-500 btn hover:text-white hover:bg-custom-600">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@push('js')
    <script>
        flatpickr("#tanggal_mulai", {
            enableTime: false,
            dateFormat: "Y-m-d",
        });

        flatpickr("#tanggal_selesai", {
            enableTime: false,
            dateFormat: "Y-m-d",
        });
    </script>
@endpush
