<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="" name="description">
    <meta content="" name="keywords">
    <title>SIMAWAFT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicons -->
    <link href="{{ asset('landings-template/assets/img/logo_ormawa/maskot.png') }}" rel="icon">
    <link href="{{ asset('landings-template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('landings-template/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landings-template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landings-template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landings-template/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('landings-template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('landings-template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landings-template/assets/css/custom.css') }}">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            color: #444;
        }

        .text-open-sans {
            font-family: 'Open Sans', sans-serif;
        }

        .text-nunito {
            font-family: 'Nunito', sans-serif;
        }

        .text-poppins {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    @include('landings-page.layouts.partials.navbar')

    @yield('content')

    @include('landings-page.layouts.partials.footer')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('landings-template/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('landings-template/assets/vendor/aos/aos.js') }}"></script>
    {{-- <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('landings-template/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landings-template/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landings-template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landings-template/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landings-template/assets/js/main.js') }}"></script>
</body>

</html>
