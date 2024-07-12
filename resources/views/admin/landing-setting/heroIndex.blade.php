@extends('admin.layouts.main')

@push('title')
    Landing Page Hero Setting
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
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Page</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">Hero-About Setting</li>
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
                        <h6 class="mb-4 text-xl grow">Data Hero Landing</h6>
                        <div class="shrink-0">

                            <a type="button" href="{{ route('data-landings.heroCreate') }}"
                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" data-lucide="plus"
                                    class="lucide lucide-plus inline-block size-4">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5v14"></path>
                                </svg> <span class="align-middle">Tambah Data</span></a>
                        </div>
                    </div>
                    <table id="dataTable" class="bordered group" style="width:100%">
                        <thead>
                            <tr>
                                <th class="ltr:!text-left rtl:!text-right">#</th>
                                <th>Title</th>
                                <th>Deskripsi Hero</th>
                                <th>Logo</th>
                                <th>Title About</th>
                                <th>Deskripsi About</th>
                                <th>About Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataHero as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{!! Str::limit($data->hero_deskripsi, 50) !!}</td>
                                    {{-- <td>{! $data->hero_deskripsi !}</td> --}}
                                    <td>
                                        <img src="{{ asset('landing/hero/logo/' . $data->logo) }}" alt="Logo"
                                            style="width: 100px; height: auto;">
                                    </td>
                                    <td>{{ $data->about_title }}</td>
                                    <td>{!! Str::limit($data->about, 50) !!}</td>
                                    {{-- <td>{{ $data->about }}</td> --}}
                                    <td>
                                        <img src="{{ asset('landing/hero/about/' . $data->about_foto) }}" alt="about_foto"
                                            style="width: 100px; height: auto;">
                                    </td>

                                    <td>
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('data-landings.heroShow', $data->id) }}"
                                                data-tooltip="default" data-tooltip-content="Lihat"
                                                class="flex items-center justify-center size-[37.5px] p-0 text-white btn bg-green-500 border-green-500 hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20">
                                                <i class="ri-eye-fill"></i>
                                            </a>

                                            <a data-tooltip="default" data-tooltip-content="Edit"
                                                href="{{ route('data-landings.heroEdit', $data->id) }}"
                                                class="flex items-center justify-center size-[37.5px] p-0 text-white btn bg-yellow-500 border-yellow-500 hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/20">
                                                <i class="ri-edit-2-fill"></i>
                                            </a>

                                            <form action="{{ route('data-landings.heroDestroy', $data->id) }}"
                                                method="POST" id="deleteForm{{ $data->id }}">
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
                                    {{-- <td>
                                        <div class="button flex gap-1 justify-items-center">
                                            <a type="button" href="{{ route('data-landings.heroEdit', $data->id) }}"
                                                class="py-1 text-xs ltr:pl-[calc(theme('spacing.1')_+_26px)] rtl:pr-[calc(theme('spacing.1')_+_26px)] relative px-1.5 text-white btn bg-yellow-400 border-yellow-400 hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-custom-100 dark:ring-yellow-400/20">
                                                <i
                                                    class="ri-edit-2-fill w-[26px] bg-white/10 flex absolute ltr:-left-[1px] rtl:-right-[1px] -bottom-[1px] -top-[1px] items-center justify-center">
                                                </i>Edit
                                            </a>
                                            <form action="{{ route('data-landings.heroDestroy', $data->id) }}"
                                                method="POST" id="deleteForm{{ $data->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="py-1 text-xs ltr:pl-[calc(theme('spacing.1')_+_26px)] rtl:pr-[calc(theme('spacing.1')_+_26px)] relative px-1.5 text-white btn bg-red-500 border-red-500 hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20"
                                                    onclick="confirmDelete('{{ $data->id }}')">
                                                    <i
                                                        class="ri-delete-bin-5-line w-[26px] bg-white/10 flex absolute ltr:-left-[1px] rtl:-right-[1px] -bottom-[1px] -top-[1px] items-center justify-center"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end card-->
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
