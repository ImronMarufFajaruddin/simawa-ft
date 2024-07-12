<div class="grid grid-cols-1 mt-5 md:grid-cols-2 [&.gridView]:grid-cols-1 xl:grid-cols-4 group [&.gridView]:xl:grid-cols-1 gap-x-5"
    id="cardGridView">
    @foreach ($dataGaleri as $data)
        <div class="card md:group-[.gridView]:flex relative">
            <div class="block overflow-hidden ">

                <div
                    class="mb-2 group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md w-full">
                    <img src="{{ asset('uploads/galeri/foto/' . $data->gambar) }}" alt=""
                        class="transition-transform duration-500 ease-in-out group-hover/card:scale-105 rounded-t-md">
                </div>

            </div>

            <div
                class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-1 group-[.gridView]:grow">

                <div class="flex items-center text-slate-500 dark:text-zink-200">
                    <div class="mr-1 text-custom-500 shrink-0 text-15">
                        <i class="ri-pencil-line"></i>
                    </div>
                    <h6>{{ $data->judul }}</h6>
                </div>

                <div class="flex items-center text-slate-500 dark:text-zink-200">
                    <div class="mr-1 text-custom-500 shrink-0 text-15">
                        <i class="ri-time-fill"></i>
                    </div>
                    <p>{{ $data->created_at }}</p>
                </div>

                @if (Gate::allows('superadmin-only'))
                    <div class="flex items-center text-slate-500 dark:text-zink-200">
                        <div class="mr-1 text-custom-500 shrink-0 text-15">
                            <i class="ri-user-3-fill"></i>
                        </div>
                        <p>{{ $data->user->name }}</p>
                    </div>
                @endif
                <div class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                    <div class="relative float-right dropdown w-full">
                        <button
                            class="flex items-center justify-center w-full h-[38.39px] dropdown-toggle p-0 text-green-500 btn bg-green-100 hover:text-white hover:bg-green-600 focus:text-white focus:bg-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:ring active:ring-green-100 dark:bg-green-500/20 dark:text-green-400 dark:hover:bg-green-500 dark:hover:text-white dark:focus:bg-green-500 dark:focus:text-white dark:active:bg-green-500 dark:active:text-white dark:ring-green-400/20"
                            id="productList1" data-bs-toggle="dropdown" fdprocessedid="w8is77">
                            <p>Action</p>
                        </button>
                        <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu w-full dark:bg-zink-600"
                            aria-labelledby="productList1">
                            <li>
                                <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                    href="apps-ecommerce-product-overview.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" data-lucide="eye"
                                        class="lucide lucide-eye inline-block w-3 h-3 ltr:mr-1 rtl:ml-1">
                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                                        </path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <span class="align-middle">Lihat</span>
                                </a>
                            </li>

                            <li>
                                <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                    href="{{ route('data-galeri.edit', $data->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" data-lucide="file-edit"
                                        class="lucide lucide-file-edit inline-block w-3 h-3 ltr:mr-1 rtl:ml-1">
                                        <path d="M4 13.5V4a2 2 0 0 1 2-2h8.5L20 7.5V20a2 2 0 0 1-2 2h-5.5">
                                        </path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <path d="M10.42 12.61a2.1 2.1 0 1 1 2.97 2.97L7.95 21 4 22l.99-3.95 5.43-5.44Z">
                                        </path>
                                    </svg>
                                    <span class="align-middle">Edit</span>
                                </a>
                            </li>


                            <li>
                                <form action="{{ route('data-galeri.destroy', $data->id) }}" method="POST"
                                    id="deleteForm{{ $data->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" onclick="confirmDelete('{{ $data->id }}')"
                                        {{-- href="confirmDelete('{{ $data->id }}')" --}}
                                        class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" data-lucide="trash-2"
                                            class="lucide lucide-trash-2 inline-block w-3 h-3 ltr:mr-1 rtl:ml-1">
                                            <path d="M3 6h18"></path>
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                            <line x1="10" x2="10" y1="11" y2="17">
                                            </line>
                                            <line x1="14" x2="14" y1="11" y2="17">
                                            </line>
                                        </svg>
                                        <span class="align-middle">Hapus</span>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div><!--end grid-->
