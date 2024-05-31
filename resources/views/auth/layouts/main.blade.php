<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg"
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
    <link rel="shortcut icon" href="{{ asset('admin-template') }}/assets/images/favicon.ico">
    <!-- Layout config Js -->
    <script src="{{ asset('admin-template') }}/assets/js/layout.js"></script>
    <!-- Icons CSS -->

    <!-- StarCode CSS -->


    <link rel="stylesheet" href="{{ asset('admin-template') }}/assets/css/starcode2.css">
</head>

<body
    class="flex items-center justify-center min-h-screen py-16 lg:py-10 bg-slate-50 dark:bg-zink-800 dark:text-zink-100 font-public">

    <div class="relative">
        @yield('content')
    </div>
    <script src="{{ asset('admin-template') }}/assets/libs/lucide/umd/lucide.js"></script>
    <script src="{{ asset('admin-template') }}/assets/js/starcode.bundle.js"></script>
    <script src="assets/js/pages/auth-login.init.js"></script>

</body>

</html>
