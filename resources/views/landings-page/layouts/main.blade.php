<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        @stack('title')
    </title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta content="Simawa Ft Unimal" name="description">
    <meta content="Imron Ma'ruf Fajaruddin" name="author">

    <!-- Favicons -->
    <link href="{{ asset('landing-template/assets/img/logo_ormawa/maskot.png') }}" rel="icon" />
    {{-- <link href="{{ asset('landing-template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" /> --}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing-template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing-template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing-template/assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing-template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing-template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('landing-template/assets/vendor/') }}" rel="stylesheet" /> --}}

    <!-- Main CSS File -->
    <link href="{{ asset('landing-template/assets/css/main.css') }}" rel="stylesheet" />
    @stack('css')
</head>

<body class="index-page">

    @include('landings-page.layouts.partials.navbar')

    @yield('content')

    @include('landings-page.layouts.partials.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing-template/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing-template/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing-template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing-template/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('landing-template/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing-template/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing-template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('landing-template/assets/js/main.js') }}"></script>

    @stack('js')
</body>

</html>
