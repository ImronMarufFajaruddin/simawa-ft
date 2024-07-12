@extends('admin.layouts.main')

@push('title')
    Profile Setting
@endpush

@push('css')
    <style type="text/css">
        .ck-editor__editable_inline {
            height: 200px;
        }
    </style>
@endpush

@section('content')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Pengaturan Akun</h5>
                    </div>
                    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                        <li
                            class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <p class="text-slate-400 dark:text-zink-200">Pages</p>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            Pengaturan Akun
                        </li>
                    </ul>
                </div>

                @if ($errors->any())
                    <div class="flex mb-2 gap-3 p-4 text-sm text-red-500 rounded-md bg-red-50 dark:bg-red-400/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" data-lucide="alert-triangle"
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
                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-12 2xl:grid-cols-12">
                            <div class="lg:col-span-2 2xl:col-span-1">
                                <div
                                    class="relative inline-block rounded-full shadow-md size-20 bg-slate-100 profile-user xl:size-28">
                                    @if (Auth::check() && Auth::user()->instansi)
                                        <img src="{{ asset('instansi/logo/' . Auth::user()->instansi->logo) }}"
                                            alt="Instansi Logo"
                                            class="object-cover border-0 rounded-full img-thumbnail user-profile-image">
                                    @else
                                        <!-- Placeholder atau tindakan lain jika logo tidak tersedia -->
                                        <img src="{{ asset('landing-template/assets/img/logo_ormawa/maskot.png') }}"
                                            alt="Placeholder Logo"
                                            class="object-cover border-0 rounded-full img-thumbnail user-profile-image">
                                    @endif
                                    <div
                                        class="absolute bottom-0 flex items-center justify-center rounded-full size-8 ltr:right-0 rtl:left-0 profile-photo-edit">
                                        <input id="profile-img-file-input" type="file"
                                            class="hidden profile-img-file-input">
                                        <label for="profile-img-file-input"
                                            class="flex items-center justify-center bg-white rounded-full shadow-lg cursor-pointer size-8 dark:bg-zink-600 profile-photo-edit">
                                            <i data-lucide="image-plus"
                                                class="size-4 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>
                                        </label>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="lg:col-span-10 2xl:col-span-9">
                                <h5 class="mb-1">{{ Auth::user()->name }}<i data-lucide="badge-check"
                                        class="inline-block size-4 text-sky-500 fill-sky-100 dark:fill-custom-500/20"></i>
                                </h5>
                                <div class="flex gap-3 mb-4">
                                    <p class="text-slate-500 dark:text-zink-200"><i data-lucide="user-circle"
                                            class="inline-block size-4 ltr:mr-1 rtl:ml-1 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>
                                        {{ Auth::user()->role }}</p>
                                    <p class="text-slate-500 dark:text-zink-200"><i data-lucide="map-pin"
                                            class="inline-block size-4 ltr:mr-1 rtl:ml-1 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>
                                        Jalan Batam, Bukit Indah, Lhokseumawe, Indonesia</p>
                                </div>
                                @foreach ($dataInstansi as $instansi)
                                    <p class="mt-4 text-slate-500 dark:text-zink-200">
                                        {!! $instansi->sejarah !!}
                                    </p>
                                @endforeach

                                <div class="flex gap-2 mt-4">
                                    @if (Auth::user()->instansi)
                                        <a href="{{ $instansi->instagram ? $instansi->instagram : '#' }}" target="__blank"
                                            class="flex items-center justify-center text-pink-500 transition-all duration-200 ease-linear bg-pink-100 rounded size-9 hover:bg-pink-200 dark:bg-pink-500/20 dark:hover:bg-pink-500/30"
                                            @if (!$instansi->instagram) onclick="return false;" @endif>
                                            <i data-lucide="instagram" class="size-4"></i>
                                        </a>
                                        <a href="{{ $instansi->website_link ? $instansi->website_link : '#' }}"
                                            target="__blank"
                                            class="flex items-center justify-center text-red-500 transition-all duration-200 ease-linear bg-red-100 rounded size-9 hover:bg-red-200 dark:bg-red-500/20 dark:hover:bg-red-500/30"
                                            @if (!$instansi->website_link) onclick="return false;" @endif>
                                            <i data-lucide="globe" class="size-4"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div><!--end grid-->
                    </div>
                    @can('admin-only')
                        <div class="card-body !py-0">
                            <ul class="flex flex-wrap w-full text-sm font-medium text-center nav-tabs">
                                <li class="group active">
                                    <a href="javascript:void(0);" data-tab-toggle="" data-target="personalTabs"
                                        class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Informasi
                                        Instansi</a>
                                </li>
                                {{-- <li class="group">
                                <a href="javascript:void(0);" data-tab-toggle="" data-target="changePasswordTabs"
                                    class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Ubah
                                    Password</a>
                            </li> --}}
                            </ul>
                        </div>
                    @endcan
                </div><!--end card-->
                @can('admin-only')
                    <div class="tab-content">
                        <div class="block tab-pane" id="personalTabs">
                            <div class="card">
                                <div class="block tab-pane" id="personalTabs">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-1 text-15">Informasi Instansi</h6>
                                            <p class="mb-4 text-slate-500 dark:text-zink-200">Update logo dan informasi instansi
                                                anda.</p>

                                            @foreach ($dataInstansi as $instansi)
                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                                        <div class="xl:col-span-6">
                                                            <label for="nama_resmi"
                                                                class="inline-block mb-2 text-base font-medium">Nama Resmi
                                                                Lembaga</label>
                                                            <input type="text" id="nama_resmi" name="nama_resmi"
                                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                                placeholder="Enter your value"
                                                                value="{{ old('nama_resmi', $instansi->nama_resmi) }}">
                                                        </div><!--end col-->
                                                        <div class="xl:col-span-6">
                                                            <label for="nama_singkatan"
                                                                class="inline-block mb-2 text-base font-medium">Nama
                                                                Singkatan</label>
                                                            <input type="text" id="nama_singkatan" name="nama_singkatan"
                                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                                placeholder="Enter your value"
                                                                value="{{ old('nama_singkatan', $instansi->nama_singkatan) }}">
                                                        </div><!--end col-->
                                                        <div class="xl:col-span-6">
                                                            <label for="no_telp"
                                                                class="inline-block mb-2 text-base font-medium">Nomor
                                                                Telepon</label>
                                                            <input type="text" id="no_telp" name="no_telp"
                                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                                placeholder="+855 8456 5555 23"
                                                                value="{{ old('no_telp', $instansi->no_telp) }}">
                                                        </div><!--end col-->
                                                        <div class="xl:col-span-6">
                                                            <label for="email"
                                                                class="inline-block mb-2 text-base font-medium">Alamat
                                                                Email</label>
                                                            <input type="email" id="email" name="email"
                                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                                placeholder="Enter your email address"
                                                                value="{{ old('email', Auth::user()->email) }}">
                                                        </div><!--end col-->
                                                        <div class="xl:col-span-6">
                                                            <label for="instagram"
                                                                class="inline-block mb-2 text-base font-medium">Instagram
                                                                Link</label>
                                                            <input type="text" id="instagram" name="instagram"
                                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                                placeholder="Enter your value"
                                                                value="{{ old('instagram', $instansi->instagram) }}">
                                                        </div><!--end col-->
                                                        <div class="xl:col-span-6">
                                                            <label for="website"
                                                                class="inline-block mb-2 text-base font-medium">Website</label>
                                                            <input type="text" id="website" name="website"
                                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                                placeholder="Enter your value"
                                                                value="{{ old('website', $instansi->website_link) }}">
                                                        </div><!--end col-->
                                                        <div class="xl:col-span-12">
                                                            <label for="sejarah"
                                                                class="block mb-2 text-base font-medium">Sejarah</label>
                                                            <textarea id="sejarah" name="sejarah"
                                                                class="w-full form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                                placeholder="Enter your description" rows="3">{{ old('sejarah', $instansi->sejarah) }}</textarea>
                                                        </div><!--end col-->
                                                    </div><!--end grid-->
                                                    <div class="flex justify-end mt-6 gap-x-4">
                                                        <button type="submit"
                                                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Update</button>
                                                        <button type="button"
                                                            class="text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20">Cancel</button>
                                                    </div>
                                                </form><!--end form-->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="hidden tab-pane" id="changePasswordTabs">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="mb-4 text-15">Changes Password</h6>
                                    <form action="#!">
                                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                            <div class="xl:col-span-4">
                                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">Old
                                                    Password*</label>
                                                <div class="relative">
                                                    <input type="password"
                                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                        id="oldpasswordInput" placeholder="Enter current password">
                                                    <button class="absolute top-2 ltr:right-4 rtl:left-4 " type="button"><i
                                                            class="align-middle ri-eye-fill text-slate-500 dark:text-zink-200"></i></button>
                                                </div>
                                            </div><!--end col-->
                                            <div class="xl:col-span-4">
                                                <label for="inputValue" class="inline-block mb-2 text-base font-medium">New
                                                    Password*</label>
                                                <div class="relative">
                                                    <input type="password"
                                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                        id="oldpasswordInput" placeholder="Enter new password">
                                                    <button class="absolute top-2 ltr:right-4 rtl:left-4 " type="button"><i
                                                            class="align-middle ri-eye-fill text-slate-500 dark:text-zink-200"></i></button>
                                                </div>
                                            </div><!--end col-->
                                            <div class="xl:col-span-4">
                                                <label for="inputValue"
                                                    class="inline-block mb-2 text-base font-medium">Confirm Password*</label>
                                                <div class="relative">
                                                    <input type="password"
                                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                        id="oldpasswordInput" placeholder="Confirm password">
                                                    <button class="absolute top-2 ltr:right-4 rtl:left-4 " type="button"><i
                                                            class="align-middle ri-eye-fill text-slate-500 dark:text-zink-200"></i></button>
                                                </div>
                                            </div><!--end col-->
                                            <div class="flex items-center xl:col-span-6">
                                                <a href="javascript:void(0);" class="underline text-custom-500 text-13">Forgot
                                                    Password ?</a>
                                            </div>
                                            <div class="flex justify-end xl:col-span-6">
                                                <button type="button"
                                                    class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Change
                                                    Password</button>
                                            </div>
                                        </div><!--end grid-->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="hidden tab-pane" id="privacyPolicyTabs">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="mb-4 text-15">Security & Privacy</h6>
                                    <div class="space-y-6">
                                        <div class="flex flex-col justify-between gap-2 md:flex-row">
                                            <div>
                                                <h4 class="text-15">Two-factor Authentication</h4>
                                                <p class="mt-1 text-slate-500 dark:text-zink-200">Two-factor authentication is
                                                    an enhanced security. Once enabled, you'll be required to give two types of
                                                    identification when you log into Google Authentication and SMS are
                                                    Supported.</p>
                                            </div>
                                            <div class="shrink-0">
                                                <button type="button"
                                                    class="py-1 text-xs px-1.5 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Enable
                                                    Two-factor Authentication</button>
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-between gap-2 md:flex-row">
                                            <div>
                                                <h4 class="text-15">Secondary Verification</h4>
                                                <p class="mt-1 text-slate-500 dark:text-zink-200">The first factor is a
                                                    password and the second commonly includes a text with a code sent to your
                                                    smartphone, or biometrics using your fingerprint, face, or retina.</p>
                                            </div>
                                            <div class="shrink-0">
                                                <button type="button"
                                                    class="py-1 text-xs px-1.5 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Set
                                                    up secondary method</button>
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-between gap-2 md:flex-row">
                                            <div>
                                                <h4 class="text-15">Backup Codes</h4>
                                                <p class="mt-1 text-slate-500 dark:text-zink-200">A backup code is
                                                    automatically generated for you when you turn on two-factor authentication
                                                    through your iOS or Android Twitter app. You can also generate a backup code
                                                    on twitter.com.</p>
                                            </div>
                                            <div class="shrink-0">
                                                <button type="button"
                                                    class="py-1 text-xs px-1.5 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Generate
                                                    backup codes</button>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="inline-block mt-6 mb-4 underline text-15">Application Notifications:</h6>
                                    <div class="space-y-6">
                                        <div class="flex justify-between gap-2">
                                            <div>
                                                <h4 class="text-15">Direct messages</h4>
                                                <p class="mt-1 text-slate-500 dark:text-zink-200">Messages from people you
                                                    follow</p>
                                            </div>
                                            <div class="shrink-0">
                                                <div
                                                    class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                                    <input type="checkbox" name="directMessage" id="directMessage"
                                                        class="absolute block transition duration-300 ease-linear border-2 rounded-full appearance-none cursor-pointer size-5 border-slate-200 dark:border-zink-600 bg-white/80 dark:bg-zink-400 peer/published checked:bg-custom-500 dark:checked:bg-custom-500 ltr:checked:right-0 rtl:checked:left-0 checked:border-custom-100 dark:checked:border-custom-900 arrow-none checked:bg-none"
                                                        checked="">
                                                    <label for="directMessage"
                                                        class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-custom-100 dark:peer-checked/published:bg-custom-900 peer-checked/published:border-custom-100 dark:peer-checked/published:border-custom-900"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-between gap-2">
                                            <div>
                                                <h4 class="text-15">Show email notifications</h4>
                                                <p class="mt-1 text-slate-500 dark:text-zink-200">Under Settings, choose
                                                    Notifications. Under Select an account, choose the account to enable
                                                    notifications for.</p>
                                            </div>
                                            <div class="shrink-0">
                                                <div
                                                    class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                                    <input type="checkbox" name="emailNotification" id="emailNotification"
                                                        class="absolute block transition duration-300 ease-linear border-2 rounded-full appearance-none cursor-pointer size-5 border-slate-200 dark:border-zink-600 bg-white/80 dark:bg-zink-400 peer/published checked:bg-custom-500 dark:checked:bg-custom-500 ltr:checked:right-0 rtl:checked:left-0 checked:border-custom-100 dark:checked:border-custom-900 arrow-none checked:bg-none"
                                                        checked="">
                                                    <label for="emailNotification"
                                                        class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-custom-100 dark:peer-checked/published:bg-custom-900 peer-checked/published:border-custom-100 dark:peer-checked/published:border-custom-900"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-between gap-2">
                                            <div>
                                                <h4 class="text-15">Show chat notifications</h4>
                                                <p class="mt-1 text-slate-500 dark:text-zink-200">Messages from people you
                                                    follow</p>
                                            </div>
                                            <div class="shrink-0">
                                                <div
                                                    class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                                    <input type="checkbox" name="chatNotification" id="chatNotification"
                                                        class="absolute block transition duration-300 ease-linear border-2 rounded-full appearance-none cursor-pointer size-5 border-slate-200 dark:border-zink-600 bg-white/80 dark:bg-zink-400 peer/published checked:bg-custom-500 dark:checked:bg-custom-500 ltr:checked:right-0 rtl:checked:left-0 checked:border-custom-100 dark:checked:border-custom-900 arrow-none checked:bg-none"
                                                        checked="">
                                                    <label for="chatNotification"
                                                        class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-custom-100 dark:peer-checked/published:bg-custom-900 peer-checked/published:border-custom-100 dark:peer-checked/published:border-custom-900"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-between gap-2">
                                            <div>
                                                <h4 class="text-15">Show purchase notifications</h4>
                                                <p class="mt-1 text-slate-500 dark:text-zink-200">Get real-time purchase alerts
                                                    to protect yourself from fraudulent charges.</p>
                                            </div>
                                            <div class="shrink-0">
                                                <div
                                                    class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                                    <input type="checkbox" name="showPurchase" id="showPurchase"
                                                        class="absolute block transition duration-300 ease-linear border-2 rounded-full appearance-none cursor-pointer size-5 border-slate-200 dark:border-zink-600 bg-white/80 dark:bg-zink-400 peer/published checked:bg-custom-500 dark:checked:bg-custom-500 ltr:checked:right-0 rtl:checked:left-0 checked:border-custom-100 dark:checked:border-custom-900 arrow-none checked:bg-none"
                                                        checked="">
                                                    <label for="customSoftSwitch"
                                                        class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-custom-100 dark:peer-checked/published:bg-custom-900 peer-checked/published:border-custom-100 dark:peer-checked/published:border-custom-900"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="inline-block mt-6 mb-4 underline text-15">Delete This Account:</h6>
                                    <p class="mt-1 text-slate-500 dark:text-zink-200">Go to the Data & Privacy section of your
                                        profile Account. Scroll to "Your data & privacy options." Delete your Profile Account.
                                        Follow the instructions to delete your account :</p>
                                    <form action="">
                                        <div class="max-w-xs mt-4">
                                            <div>
                                                <input type="password"
                                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    id="oldpasswordInput" placeholder="Enter password">
                                            </div>
                                            <div class="flex mt-4 gap-x-2">
                                                <button type="button"
                                                    class="text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20">Close
                                                    & delete this Account</button>
                                                <button type="button"
                                                    class="text-slate-500 btn bg-slate-200 border-slate-200 hover:text-slate-600 hover:bg-slate-300 hover:border-slate-300 focus:text-slate-600 focus:bg-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-100 active:text-slate-600 active:bg-slate-300 active:border-slate-300 active:ring active:ring-slate-100 dark:bg-zink-600 dark:hover:bg-zink-500 dark:border-zink-600 dark:hover:border-zink-500 dark:text-zink-200 dark:ring-zink-400/50">Cancel</button>
                                            </div>
                                        </div><!--end col-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection
    @push('js')
        <script src="{{ asset('admin-template') }}/assets/js/pages/pages-account-setting.init.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                ClassicEditor
                    .create(document.querySelector('#sejarah'), {
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
