@extends('admin.layouts.main')

@push('title')
    Proposal
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
                        Data Proposal
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
                    <h6 class="mb-4 text-15">Data Proposal</h6>
                    <p class="mb-4 text-slate-400">Upload Proposal dan Dokumen lainnya seperti : <br> <code
                            class="text-xs text-pink-500 select-all">- Dokumen berformat : .doc, .docx, .pdf dan atau .xlsx
                            dengan ukuran maksimal 5 MB<br>- Surat Izin Kegiatan atau surat-surat lainnya <br> -
                            Dokumen lainnya dapat di upload di lain waktu pada halaman ini </code>.
                    </p>

                    <div class="shrink-0 mb-3">
                        <button data-modal-target="modalAdd" type="button"
                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" data-lucide="plus" class="lucide lucide-plus inline-block size-4">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg> <span class="align-middle">Tambah Data</span></button>
                    </div>
                    <table id="dataTable" class="w-full bordered group" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Penyelenggara</th>
                                <th>Kegiatan</th>
                                <th>Dokumen</th>
                                <th>Dokumen lain</th>
                                <th>Status</th>
                                <th>Komentar</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($dataProposal as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->kegiatan->nama_kegiatan }}</td>
                                    <td>
                                        <div class="flex items-center justify-center">
                                            @if ($data->dokumen)
                                                <a href="{{ asset('dokumen/proposal/' . $data->dokumen) }} "
                                                    download="{{ $data->dokumen }}" type="button"
                                                    class="flex items-center text-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-sky-500 btn bg-sky-100 hover:text-white hover:bg-sky-600 focus:text-white focus:bg-sky-600 focus:ring focus:ring-sky-100 active:text-white active:bg-sky-600 active:ring active:ring-sky-100 dark:bg-sky-500/20 dark:text-sky-400 dark:hover:bg-sky-500 dark:hover:text-white dark:focus:bg-sky-500 dark:focus:text-white dark:active:bg-sky-500 dark:active:text-white dark:ring-sky-400/20">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            @else
                                                <span>No Document</span>
                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        <div class="flex items-center justify-center">
                                            @if ($data->dokumen_lainnya)
                                                <a href="{{ asset('dokumen/proposal/lainnya/' . $data->dokumen_lainnya) }} "
                                                    download="{{ $data->dokumen_lainnya }}" type="button"
                                                    class="flex items-center text-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-sky-500 btn bg-sky-100 hover:text-white hover:bg-sky-600 focus:text-white focus:bg-sky-600 focus:ring focus:ring-sky-100 active:text-white active:bg-sky-600 active:ring active:ring-sky-100 dark:bg-sky-500/20 dark:text-sky-400 dark:hover:bg-sky-500 dark:hover:text-white dark:focus:bg-sky-500 dark:focus:text-white dark:active:bg-sky-500 dark:active:text-white dark:ring-sky-400/20">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            @else
                                                <span>No Document</span>
                                            @endif
                                        </div>
                                    </td>


                                    @if (Gate::allows('superadmin-only'))
                                        <td>
                                            <form action="{{ route('proposal.update-status', $data->id) }}" method="POST"
                                                class="flex items-center justify-between">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" id="status_{{ $data->id }}"
                                                    class="form-select w-2/3 border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                                    <option value="menunggu"
                                                        {{ $data->status == 'menunggu' ? 'selected' : '' }}>Menunggu
                                                    </option>
                                                    <option value="revisi"
                                                        {{ $data->status == 'revisi' ? 'selected' : '' }}>Revisi</option>
                                                    <option value="ditolak"
                                                        {{ $data->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                    <option value="diterima"
                                                        {{ $data->status == 'diterima' ? 'selected' : '' }}>Diterima
                                                    </option>
                                                </select>

                                                <button type="submit"
                                                    class="w-1/3 ml-2 bg-custom-500 hover:bg-custom-600 text-white py-2 px-6 rounded">Submit</button>
                                            </form>
                                        </td>
                                    @else
                                        <td>
                                            <span
                                                class="inline-block px-2 py-1 text-xs font-semibold leading-none {{ $data->status == 'menunggu' ? 'text-yellow-600 bg-yellow-200' : ($data->status == 'revisi' ? 'text-custom-600 bg-custom-200' : ($data->status == 'ditolak' ? 'text-red-600 bg-red-200' : 'text-green-600 bg-green-200')) }} rounded">{{ $data->status }}</span>
                                        </td>
                                    @endif

                                    <td>
                                        <div class="flex items-center gap-2">
                                            @if (Gate::allows('superadmin-only'))
                                                <button data-tooltip="default" data-tooltip-content="Tambah Komentar"
                                                    data-modal-target="modalTambahKomentar{{ $data->id }}"
                                                    type="button"
                                                    class="flex items-center justify-center size-[37.5px] p-0 text-green-500 bg-white border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:bg-zink-700 dark:hover:bg-green-500 dark:ring-green-400/20 dark:focus:bg-green-500">
                                                    <i class="ri-chat-new-fill"></i>
                                                </button>
                                            @endif

                                            @if ($data->komentar)
                                                {!! Str::limit($data->komentar, 30) !!}
                                            @else
                                                <span>Belum ada komentar</span>
                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('data-proposal.show', $data->id) }}" data-tooltip="default"
                                                data-tooltip-content="Lihat"
                                                class="flex items-center justify-center size-[37.5px] p-0 text-white btn bg-green-500 border-green-500 hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20">
                                                <i class="ri-eye-fill"></i>
                                            </a>

                                            @if (Gate::allows('superadmin-only') || $data->status == 'revisi' || $data->status == 'ditolak')
                                                <button data-tooltip="default" data-tooltip-content="Edit"
                                                    data-modal-target="modalEdit{{ $data->id }}"
                                                    class="flex items-center justify-center size-[37.5px] p-0 text-white btn bg-yellow-500 border-yellow-500 hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/20">
                                                    <i class="ri-edit-2-fill"></i>
                                                </button>
                                            @endif


                                            <form action="{{ route('data-proposal.destroy', $data->id) }}" method="POST"
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
    @include('admin.proposal.modal')
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
