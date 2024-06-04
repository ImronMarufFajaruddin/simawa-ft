<!DOCTYPE html>
<html lang="en" class="light group scroll-smooth" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg"
    data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>
        @stack('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="StarCode Kh" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin-template/assets/images/favicon.ico') }}">
    <!-- Layout config Js -->
    <script src="{{ asset('admin-template/assets/js/layout.js') }}"></script>
    <!-- StarCode CSS -->
    <link rel="stylesheet" href="{{ asset('admin-template/assets/css/starcode2.css') }}">
    <!-- message toastr -->
    <link rel="stylesheet" href="{{ asset('admin-template/assets/css/toastr.min.css') }}">
    <script src="{{ asset('admin-template/assets/js/toastr_jquery.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/js/toastr.min.js') }}"></script>

</head>

<body
    class="bg-body-bg text-body font-public dark:text-zink-100 dark:bg-zink-800 group-data-[skin=bordered]:bg-body-bordered group-data-[skin=bordered]:dark:bg-zink-700 text-base">
    <div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">
        <div
            class="app-menu w-vertical-menu bg-vertical-menu border-vertical-menu-border group-data-[sidebar-size=md]:w-vertical-menu-md group-data-[sidebar-size=sm]:w-vertical-menu-sm group-data-[sidebar-size=sm]:pt-header group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar=dark]:border-vertical-menu-dark group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar=brand]:border-vertical-menu-brand group-data-[sidebar=modern]:to-vertical-menu-to-modern group-data-[sidebar=modern]:from-vertical-menu-form-modern group-data-[layout=horizontal]:top-header group-data-[sidebar=modern]:border-vertical-menu-border-modern group-data-[layout=horizontal]:dark:bg-zink-700 group-data-[layout=horizontal]:dark:border-zink-500 group-data-[sidebar=dark]:dark:bg-zink-700 group-data-[sidebar=dark]:dark:border-zink-600 group-data-[layout=horizontal]:group-data-[navbar=bordered]:[&.sticky]:top-header group-data-[layout=horizontal]:dark:shadow-zink-500/10 fixed bottom-0 top-0 z-[1003] hidden transition-all duration-75 ease-linear group-data-[layout=horizontal]:group-data-[navbar=scroll]:absolute group-data-[sidebar-size=sm]:absolute group-data-[layout=horizontal]:group-data-[navbar=bordered]:inset-x-4 group-data-[layout=horizontal]:bottom-auto group-data-[layout=horizontal]:group-data-[navbar=bordered]:top-[calc(theme('spacing.header')_+_theme('spacing.4'))] group-data-[layout=horizontal]:group-data-[navbar=hidden]:top-0 group-data-[layout=horizontal]:group-data-[navbar=hidden]:h-16 group-data-[layout=horizontal]:group-data-[navbar=bordered]:w-[calc(100%_-_2rem)] group-data-[layout=horizontal]:w-full group-data-[layout=horizontal]:group-data-[navbar=bordered]:rounded-b-md group-data-[layout=horizontal]:border-r-0 group-data-[layout=horizontal]:border-t group-data-[sidebar=modern]:bg-gradient-to-tr group-data-[layout=horizontal]:opacity-0 group-data-[layout=horizontal]:shadow-md group-data-[layout=horizontal]:shadow-slate-500/10 print:hidden md:block">
            <div
                class="h-header group-data-[sidebar-size=sm]:bg-vertical-menu group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar-size=sm]:group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:to-vertical-menu-to-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:from-vertical-menu-form-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:bg-vertical-menu-modern group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:dark:bg-zink-700 flex items-center justify-center px-5 text-center group-data-[sidebar-size=sm]:fixed group-data-[sidebar-size=sm]:top-0 group-data-[sidebar-size=sm]:z-10 group-data-[layout=horizontal]:hidden group-data-[sidebar-size=sm]:w-[calc(theme('spacing.vertical-menu-sm')_-_1px)] group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:bg-gradient-to-br">
                <a href=""
                    class="group-data-[sidebar=brand]:hidden group-data-[sidebar=dark]:hidden group-data-[sidebar=modern]:hidden">
                    <span class="hidden group-data-[sidebar-size=sm]:block">
                        <img src="admin-template/assets/images/logo.png" alt="" class="mx-auto h-6">
                    </span>
                    <span class="group-data-[sidebar-size=sm]:hidden">
                        <img src="admin-template/assets/images/logo-dark.png" alt="" class="mx-auto h-6">
                    </span>
                </a>
                <a href=""
                    class="hidden group-data-[sidebar=brand]:block group-data-[sidebar=dark]:block group-data-[sidebar=modern]:block">
                    <span class="hidden group-data-[sidebar-size=sm]:block">
                        <img src="admin-template/assets/images/logo.png" alt="" class="mx-auto h-6">
                    </span>
                    <span class="group-data-[sidebar-size=sm]:hidden">
                        <img src="admin-template/assets/images/logo-light.png" alt="" class="mx-auto h-6">
                    </span>
                </a>
                <button type="button" class="float-end hidden p-0" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
            <!-- Left Sidebar -->
            <div id="scrollbar"
                class="group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:h-56 group-data-[sidebar-size=lg]:max-h-[calc(100vh_-_theme('spacing.header')_*_1.2)] group-data-[sidebar-size=md]:max-h-[calc(100vh_-_theme('spacing.header')_*_1.2)] group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:overflow-auto group-data-[layout=horizontal]:md:h-auto group-data-[layout=horizontal]:md:overflow-visible">
                @include('admin.layouts.partials.sidebar')
                <!-- Left Sidebar End -->
            </div>
        </div>

        <!-- Left Sidebar End -->
        <div id="sidebar-overlay" class="absolute inset-0 z-[1002] hidden bg-slate-500/30"></div>
        @include('admin.layouts.partials.navbar')

        <div class="group-data-[sidebar-size=sm]:min-h-sm relative min-h-screen">
            <!-- message -->
            {{-- {!! Toastr::message() !!} --}}
            <!-- Page-content -->
            @yield('content')
            <!-- End Page-content -->

            <!-- Page-footer -->
            @include('admin.layouts.partials.footer')
            <!-- End Page-footer -->
        </div>
    </div>
    <!-- end main content -->
    <div class="h-header fixed bottom-6 right-12 hidden items-center group-data-[navbar=hidden]:flex">
        <button data-drawer-target="customizerButton" type="button"
            class="inline-flex h-12 w-12 items-center justify-center rounded-md bg-sky-500 p-0 text-sky-50 shadow-lg transition-all duration-200 ease-linear">
            <i data-lucide="settings" class="inline-block h-5 w-5"></i>
        </button>
    </div>

    <div id="customizerButton" drawer-end=""
        class="z-drawer show dark:bg-zink-600 fixed inset-y-0 flex w-full transform flex-col bg-white shadow transition-transform duration-300 ease-in-out ltr:right-0 rtl:left-0 md:w-96">
        <div class="dark:border-zink-500 flex justify-between border-b border-slate-200 p-4">
            <div class="grow">
                <h5 class="text-16 mb-1">starcode Theme Customizer</h5>
                <p class="dark:text-zink-200 font-normal text-slate-500">Choose your themes & layouts etc.</p>
            </div>
            <div class="shrink-0">
                <button data-drawer-close="customizerButton"
                    class="dark:text-zink-200 dark:hover:text-zink-50 text-slate-500 transition-all duration-150 ease-linear hover:text-slate-800"><i
                        data-lucide="x" class="h-4 w-4"></i></button>
            </div>
        </div>
        <div class="h-full overflow-y-auto p-6">
            <div>
                <h5 class="text-15 mb-3 capitalize underline">Choose Layouts</h5>
                <div class="mb-5 grid grid-cols-1 gap-7 sm:grid-cols-2">
                    <div class="relative">
                        <input id="layout-one" name="dataLayout"
                            class="vertical-menu-btn checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500 absolute top-2 h-4 w-4 cursor-pointer appearance-none rounded-full border border-slate-300 bg-slate-100 ltr:right-2 rtl:left-2"
                            type="radio" value="vertical" checked="">
                        <label
                            class="dark:border-zink-500 block h-24 w-full cursor-pointer overflow-hidden rounded-lg border border-slate-200 p-0"
                            for="layout-one">
                            <span class="flex h-full gap-0">
                                <span class="shrink-0">
                                    <span class="dark:border-zink-500 flex h-full flex-col gap-1 border-slate-200 p-1">
                                        <span class="dark:bg-zink-400 mb-2 block rounded bg-slate-100 p-1 px-2"></span>
                                        <span class="dark:bg-zink-500 block bg-slate-100 p-1 px-2 pb-0"></span>
                                        <span class="dark:bg-zink-500 block bg-slate-100 p-1 px-2 pb-0"></span>
                                        <span class="dark:bg-zink-500 block bg-slate-100 p-1 px-2 pb-0"></span>
                                    </span>
                                </span>
                                <span class="grow">
                                    <span class="flex h-full flex-col">
                                        <span class="dark:bg-zink-500 block h-3 bg-slate-100"></span>
                                        <span class="dark:bg-zink-500 mt-auto block h-3 bg-slate-100"></span>
                                    </span>
                                </span>
                            </span>
                        </label>
                        <h5 class="text-15 mt-2 text-center">Vertical</h5>
                    </div>

                    <div class="relative">
                        <input id="layout-two" name="dataLayout"
                            class="vertical-menu-btn checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500 absolute top-2 h-4 w-4 cursor-pointer appearance-none rounded-full border border-slate-300 bg-slate-100 ltr:right-2 rtl:left-2"
                            type="radio" value="horizontal">
                        <label
                            class="dark:border-zink-500 block h-24 w-full cursor-pointer overflow-hidden rounded-lg border border-slate-200 p-0"
                            for="layout-two">
                            <span class="flex h-full flex-col gap-1">
                                <span class="dark:bg-zink-500 flex items-center gap-1 bg-slate-100 p-1">
                                    <span class="dark:bg-zink-500 ml-1 block rounded bg-white p-1"></span>
                                    <span class="dark:bg-zink-500 ms-auto block bg-white p-1 px-2 pb-0"></span>
                                    <span class="dark:bg-zink-500 block bg-white p-1 px-2 pb-0"></span>
                                </span>
                                <span class="dark:bg-zink-500 block bg-slate-100 p-1"></span>
                                <span class="dark:bg-zink-500 mt-auto block bg-slate-100 p-1"></span>
                            </span>
                        </label>
                        <h5 class="text-15 mt-2 text-center">Horizontal</h5>
                    </div>
                </div>

                <div id="semi-dark">
                    <div class="flex items-center">
                        <div class="relative mr-2 inline-block w-10 align-middle transition duration-200 ease-in">
                            <input type="checkbox" name="customDefaultSwitch" value="dark"
                                id="customDefaultSwitch"
                                class="peer/published checked:border-custom-500 arrow-none dark:border-zink-500 dark:bg-zink-500 dark:checked:bg-zink-400 absolute block h-5 w-5 cursor-pointer appearance-none rounded-full border-2 border-slate-200 bg-white/80 transition duration-300 ease-linear checked:right-0 checked:bg-white checked:bg-none">
                            <label for="customDefaultSwitch"
                                class="peer-checked/published:bg-custom-500 peer-checked/published:border-custom-500 dark:border-zink-500 dark:bg-zink-600 block h-5 cursor-pointer overflow-hidden rounded-full border border-slate-200 bg-slate-200 transition duration-300 ease-linear"></label>
                        </div>
                        <label for="customDefaultSwitch" class="inline-block text-base font-medium">Semi Dark (Sidebar
                            & Header)</label>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <!-- data-skin="" -->
                <h5 class="text-15 mb-3 capitalize underline">Skin Layouts</h5>
                <div class="mb-5 grid grid-cols-1 gap-7 sm:grid-cols-2">
                    <div class="relative">
                        <input id="layoutSkitOne" name="dataLayoutSkin"
                            class="vertical-menu-btn checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500 absolute top-2 h-4 w-4 cursor-pointer appearance-none rounded-full border border-slate-300 bg-slate-100 ltr:right-2 rtl:left-2"
                            type="radio" value="default">
                        <label
                            class="dark:border-zink-500 dark:bg-zink-600 block h-24 w-full cursor-pointer overflow-hidden rounded-lg border border-slate-200 bg-slate-50 p-0"
                            for="layoutSkitOne">
                            <span class="flex h-full gap-0">
                                <span class="shrink-0">
                                    <span class="dark:border-zink-500 flex h-full flex-col gap-1 border-slate-200 p-1">
                                        <span class="dark:bg-zink-400 mb-2 block rounded bg-slate-100 p-1 px-2"></span>
                                        <span class="dark:bg-zink-500 block bg-slate-100 p-1 px-2 pb-0"></span>
                                        <span class="dark:bg-zink-500 block bg-slate-100 p-1 px-2 pb-0"></span>
                                        <span class="dark:bg-zink-500 block bg-slate-100 p-1 px-2 pb-0"></span>
                                    </span>
                                </span>
                                <span class="grow">
                                    <span class="flex h-full flex-col">
                                        <span class="dark:bg-zink-500 block h-3 bg-slate-100"></span>
                                        <span class="dark:bg-zink-500 mt-auto block h-3 bg-slate-100"></span>
                                    </span>
                                </span>
                            </span>
                        </label>
                        <h5 class="text-15 mt-2 text-center">Default</h5>
                    </div>

                    <div class="relative">
                        <input id="layoutSkitTwo" name="dataLayoutSkin"
                            class="vertical-menu-btn checked:bg-custom-500 checked:border-custom-500 dark:bg-zink-400 dark:border-zink-500 absolute top-2 h-4 w-4 cursor-pointer appearance-none rounded-full border border-slate-300 bg-slate-100 ltr:right-2 rtl:left-2"
                            type="radio" value="bordered" checked="">
                        <label
                            class="dark:border-zink-500 block h-24 w-full cursor-pointer overflow-hidden rounded-lg border border-slate-200 p-0"
                            for="layoutSkitTwo">
                            <span class="flex h-full gap-0">
                                <span class="shrink-0">
                                    <span class="dark:border-zink-500 flex h-full flex-col gap-1 border-slate-200 p-1">
                                        <span class="dark:bg-zink-400 mb-2 block rounded bg-slate-100 p-1 px-2"></span>
                                        <span class="dark:bg-zink-500 block bg-slate-100 p-1 px-2 pb-0"></span>
                                        <span class="dark:bg-zink-500 block bg-slate-100 p-1 px-2 pb-0"></span>
                                        <span class="dark:bg-zink-500 block bg-slate-100 p-1 px-2 pb-0"></span>
                                    </span>
                                </span>
                                <span class="grow">
                                    <span class="flex h-full flex-col">
                                        <span class="dark:border-zink-500 block h-3 border-b border-slate-200"></span>
                                        <span
                                            class="dark:border-zink-500 mt-auto block h-3 border-t border-slate-200"></span>
                                    </span>
                                </span>
                            </span>
                        </label>
                        <h5 class="text-15 mt-2 text-center">Bordered</h5>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <!-- data-mode="" -->
                <h5 class="text-15 mb-3 capitalize underline">Light & Dark</h5>
                <div class="flex gap-3">
                    <button type="button" id="dataModeOne" name="dataMode" value="light"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">Light
                        Mode</button>
                    <button type="button" id="dataModeTwo" name="dataMode" value="dark"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">Dark
                        Mode</button>
                </div>
            </div>

            <div class="mt-6">
                <!-- dir="ltr" -->
                <h5 class="text-15 mb-3 capitalize underline">LTR & RTL</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="diractionOne" name="dir" value="ltr"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">LTR
                        Mode</button>
                    <button type="button" id="diractionTwo" name="dir" value="rtl"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">RTL
                        Mode</button>
                </div>
            </div>

            <div class="mt-6">
                <!-- data-content -->
                <h5 class="text-15 mb-3 capitalize underline">Content Width</h5>
                <div class="flex gap-3">
                    <button type="button" id="datawidthOne" name="datawidth" value="fluid"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">Fluid</button>
                    <button type="button" id="datawidthTwo" name="datawidth" value="boxed"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">Boxed</button>
                </div>
            </div>

            <div class="mt-6" id="sidebar-size">
                <!-- data-sidebar-size="" -->
                <h5 class="text-15 mb-3 capitalize underline">Sidebar Size</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="sidebarSizeOne" name="sidebarSize" value="lg"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">Default</button>
                    <button type="button" id="sidebarSizeTwo" name="sidebarSize" value="md"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">Compact</button>
                    <button type="button" id="sidebarSizeThree" name="sidebarSize" value="sm"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">Small
                        (Icon)</button>
                </div>
            </div>

            <div class="mt-6" id="navigation-type">
                <!-- data-navbar="" -->
                <h5 class="text-15 mb-3 capitalize underline">Navigation Type</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="navbarTwo" name="navbar" value="sticky"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 active border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">Sticky</button>
                    <button type="button" id="navbarOne" name="navbar" value="scroll"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">Scroll</button>
                    <button type="button" id="navbarThree" name="navbar" value="bordered"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">Bordered</button>
                    <button type="button" id="navbarFour" name="navbar" value="hidden"
                        class="btn [&.active]:text-custom-500 [&.active]:bg-custom-50 [&.active]:border-custom-200 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-400 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:hover:border-zink-400 dark:[&.active]:bg-custom-500/10 dark:[&.active]:border-custom-500/30 dark:[&.active]:text-custom-500 border-dashed border-slate-200 bg-white text-slate-500 transition-all duration-200 ease-linear hover:border-slate-200 hover:bg-slate-50 hover:text-slate-500">Hidden</button>
                </div>
            </div>

            <div class="mt-6" id="sidebar-color">
                <!-- data-sidebar="" light, dark, brand, modern-->
                <h5 class="text-15 mb-3 capitalize underline">Sizebar Colors</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="sidebarColorOne" name="sidebarColor" value="light"
                        class="active group flex h-10 w-10 items-center justify-center rounded-md border border-slate-200 bg-white"><i
                            data-lucide="check"
                            class="hidden h-5 w-5 text-slate-600 group-[.active]:inline-block"></i></button>
                    <button type="button" id="sidebarColorTwo" name="sidebarColor" value="dark"
                        class="border-zink-900 bg-zink-900 group flex h-10 w-10 items-center justify-center rounded-md border"><i
                            data-lucide="check"
                            class="hidden h-5 w-5 text-white group-[.active]:inline-block"></i></button>
                    <button type="button" id="sidebarColorThree" name="sidebarColor" value="brand"
                        class="border-custom-800 bg-custom-800 group flex h-10 w-10 items-center justify-center rounded-md border"><i
                            data-lucide="check"
                            class="hidden h-5 w-5 text-white group-[.active]:inline-block"></i></button>
                    <button type="button" id="sidebarColorFour" name="sidebarColor" value="modern"
                        class="group flex h-10 w-10 items-center justify-center rounded-md border border-purple-950 bg-gradient-to-t from-red-400 to-purple-500">
                        <i data-lucide="check"
                            class="hidden h-5 w-5 text-white group-[.active]:inline-block"></i></button>
                </div>
            </div>

            <div class="mt-6">
                <!-- data-topbar="" light, dark, brand, modern-->
                <h5 class="text-15 mb-3 capitalize underline">Topbar Colors</h5>
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="topbarColorOne" name="topbarColor" value="light"
                        class="active group flex h-10 w-10 items-center justify-center rounded-md border border-slate-200 bg-white"><i
                            data-lucide="check"
                            class="hidden h-5 w-5 text-slate-600 group-[.active]:inline-block"></i></button>
                    <button type="button" id="topbarColorTwo" name="topbarColor" value="dark"
                        class="border-zink-900 bg-zink-900 group flex h-10 w-10 items-center justify-center rounded-md border"><i
                            data-lucide="check"
                            class="hidden h-5 w-5 text-white group-[.active]:inline-block"></i></button>
                    <button type="button" id="topbarColorThree" name="topbarColor" value="brand"
                        class="border-custom-800 bg-custom-800 group flex h-10 w-10 items-center justify-center rounded-md border"><i
                            data-lucide="check"
                            class="hidden h-5 w-5 text-white group-[.active]:inline-block"></i></button>
                </div>
            </div>

        </div>
        <div class="dark:border-zink-500 flex items-center justify-between gap-3 border-t border-slate-200 p-4">
            <button type="button" id="reset-layout"
                class="btn w-full border-slate-200 bg-slate-200 text-slate-500 transition-all duration-200 ease-linear hover:border-slate-300 hover:bg-slate-300 hover:text-slate-600 focus:border-slate-300 focus:bg-slate-300 focus:text-slate-600 focus:ring focus:ring-slate-100">Reset</button>
            <a href="#!"
                class="btn w-full border-red-500 bg-red-500 text-white transition-all duration-200 ease-linear hover:border-red-600 hover:bg-red-600 hover:text-white focus:border-red-600 focus:bg-red-600 focus:text-white focus:ring focus:ring-red-100 active:border-red-600 active:bg-red-600 active:text-white active:ring active:ring-red-100">Buy
                Now</a>
        </div>
    </div>

    <script src="{{ asset('admin-template/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/%40popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/tippy.js/tippy-bundle.umd.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/lucide/umd/lucide.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/js/starcode.bundle.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin-template/assets/js/app.js') }}"></script>

    <script src="{{ asset('admin-template/assets/js/datatables/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('admin-template/assets/js/datatables/data-tables.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/js/datatables/data-tables.tailwindcss.min.js') }}"></script>
    <!--buttons dataTables-->
    <script src="{{ asset('admin-template/assets/js/datatables/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/js/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/js/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/js/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/js/datatables/buttons.print.min.js') }}"></script>

    <script src="{{ asset('admin-template/assets/js/datatables/datatables.init.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/js/pages/apps-ecommerce-product-create.init.js') }}"></script>
    <script src="{{ asset('admin-template/assets/js/pages/form-file-upload.init.js') }}"></script>
    <!-- Sweet Alerts js -->
    {{-- <script src="{{ asset('admin-template/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--sweet alert init js-->
    {{-- <script src="{{ asset('admin-template/assets/js/pages/sweetalert.init.js') }}"></script> --}}

    @stack('js')
</body>

</html>
