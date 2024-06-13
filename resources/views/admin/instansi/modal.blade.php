{{-- Modal Tambah Instansi --}}
<div id="modalAddInstansi" modal-center="" data-modal-backdrop="modalAddInstansi"
    class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
    <div class="w-screen md:w-[40rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
            <h5 class="text-16">Tambah Data</h5>
            <button data-modal-close="modalAddInstansi"
                class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500 dark:text-zink-200 dark:hover:text-red-500"><i
                    data-lucide="x" class="size-5"></i></button>
        </div>

        <div class="max-h-[calc(100vh-180px)] p-4 overflow-y-auto">
            <form action="{{ route('data-instansi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="kategori_instansi_id" class="inline-block mb-2 text-base font-medium">Kategori
                        Instansi<span class="text-red-500">*</span></label>
                    <select name="kategori_instansi_id" id="kategori_instansi_id"
                        class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                        <option value="">---Pilih Kategori Instansi---</option>
                        @foreach ($dataKategoriInstansi as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->kategori_nama }}</option>
                        @endforeach
                    </select>
                    @error('kategori_instansi_id')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="user_id" class="inline-block mb-2 text-base font-medium">Kategori
                        Instansi<span class="text-red-500">*</span></label>
                    <select name="user_id" id="user_id"
                        class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                        <option value="">---Pilih User---</option>
                        @foreach ($dataUser as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('kategori_instansi_id')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_resmi" class="inline-block mb-2 text-base font-medium">Nama Resmi<span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nama_resmi" id="nama_resmi" placeholder=""
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                    @error('nama_resmi') is-invalid @enderror"
                        value="{{ old('nama_resmi') }}" autofocus>
                    @error('nama_resmi')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_singkatan" class="inline-block mb-2 text-base font-medium">Nama
                        Singkatan<span class="text-red-500">*</span></label>
                    <input type="text" name="nama_singkatan" id="nama_singkatan" placeholder=""
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                    @error('nama_singkatan') is-invalid @enderror"
                        value="{{ old('nama_singkatan') }}" autofocus>
                    @error('nama_singkatan')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="logo" class="inline-block mb-2 text-base font-medium">Upload Logo</label>
                    <input type="file" name="logo"
                        class="form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                    @error('logo') is-invalid @enderror">
                    @error('logo')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_telp" class="inline-block mb-2 text-base font-medium">No. Telp<span
                            class="text-red-500">*</span></label>
                    <input type="number" name="no_telp" id="no_telp" placeholder=""
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                    @error('no_telp') is-invalid @enderror"
                        value="{{ old('no_telp') }}" autofocus>
                    @error('no_telp')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="instagram" class="inline-block mb-2 text-base font-medium">Instagram<span
                            class="text-red-500">*</span></label>
                    <input type="text" name="instagram" id="instagram" placeholder="Link Instagram"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                    @error('instagram') is-invalid @enderror"
                        value="{{ old('instagram') }}">
                    @error('instagram')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="sejarah" class="inline-block mb-2 text-base font-medium">Sejarah</label>
                    <textarea name="sejarah" id="sejarah" rows="6" placeholder="Sejarah Instansi"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">{{ old('sejarah') }}</textarea>
                </div>

                <div class="flex justify-end mt-auto border-t border-slate-200 dark:border-zink-500 p-2">
                    <button type="button" data-modal-close="modalAddInstansi"
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
{{-- Modal Tambah Instansi --}}


@foreach ($dataInstansi as $data)
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

            <div class="max-h-[calc(100vh-180px)] p-4 overflow-y-auto">
                <form action="{{ route('data-instansi.update', $data->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="kategori_instansi_id" class="inline-block mb-2 text-base font-medium">Kategori
                            Instansi<span class="text-red-500">*</span></label>
                        <select name="kategori_instansi_id" id="kategori_instansi_id"
                            class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                            <option value="">---Pilih Kategori Instansi---</option>
                            @foreach ($dataKategoriInstansi as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ old('kategori_instansi_id', $data->kategori_instansi_id) == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->kategori_nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_instansi_id')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_resmi" class="inline-block mb-2 text-base font-medium">Nama Resmi<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_resmi" id="nama_resmi" placeholder=""
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                        @error('nama_resmi') is-invalid @enderror"
                            value="{{ old('nama_resmi', $data->nama_resmi) }}" autofocus>
                        @error('nama_resmi')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_singkatan" class="inline-block mb-2 text-base font-medium">Nama
                            Singkatan<span class="text-red-500">*</span></label>
                        <input type="text" name="nama_singkatan" id="nama_singkatan" placeholder=""
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                        @error('nama_singkatan') is-invalid @enderror"
                            value="{{ old('nama_singkatan', $data->nama_singkatan) }}" autofocus>
                        @error('nama_singkatan')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="inline-block mb-2 text-base font-medium">Upload Logo</label>
                        <input type="file" name="logo"
                            class="form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                        @error('logo') is-invalid @enderror">
                        @error('logo')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_telp" class="inline-block mb-2 text-base font-medium">No. Telp<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="no_telp" id="no_telp" placeholder=""
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                        @error('no_telp') is-invalid @enderror"
                            value="{{ old('no_telp', $data->no_telp) }}" autofocus>
                        @error('no_telp')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="instagram" class="inline-block mb-2 text-base font-medium">Instagram<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="instagram" id="instagram" placeholder="Link Instagram"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                        @error('instagram') is-invalid @enderror"
                            value="{{ old('instagram', $data->instagram) }}">
                        @error('instagram')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sejarah" class="inline-block mb-2 text-base font-medium">Sejarah</label>
                        <textarea name="sejarah" id="sejarah" rows="6" placeholder="Sejarah Instansi"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">{{ old('sejarah', $data->sejarah) }}</textarea>
                    </div>

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
