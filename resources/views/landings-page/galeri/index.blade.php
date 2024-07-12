@extends('landings-page.layouts.main')
@push('title')
    Galeri
@endpush

@section('content')
    <main class="main">
        <div class="page-title aos-init aos-animate" data-aos="fade">
            <div class="heading">
                <div class="container">

                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li class="current">Galeri ORMAWA</li>
                    </ol>
                </div>
            </nav>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <section id="portfolio" class="portfolio section">
                        <!-- Section Title -->
                        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
                            <p class="text-uppercase">Galeri</p>
                            <h2>Dokumentasi dan Galeri keluarga Besar Fakultas Teknik</h2>
                        </div><!-- End Section Title -->

                        <div class="container">
                            <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                                data-sort="original-order">
                                <ul class="portfolio-filters isotope-filters aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <li data-filter="*" class="filter-active">Semua</li>
                                    @foreach ($namaSingkatan as $singkatan)
                                        <li data-filter=".filter-{{ Str::slug($singkatan) }}">
                                            {{ Str::title(strtolower($singkatan)) }}</li>
                                    @endforeach

                                </ul><!-- End Portfolio Filters -->
                                <div class="row gy-4 isotope-container aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="200">
                                    @foreach ($dataGaleri as $data)
                                        <div
                                            class="col-lg-3 col-md-4 portfolio-item isotope-item filter-{{ Str::slug($data->user->instansi->nama_singkatan) }}">
                                            <div class="portfolio-content h-100">
                                                <img src="{{ asset('uploads/galeri/foto/' . $data->gambar) }}"
                                                    class="img-fluid" alt="">
                                                <div class="portfolio-info">
                                                    <h4>{{ $data->user->instansi->nama_singkatan }}</h4>
                                                    <p>{{ $data->judul }}</p>
                                                    <a href="{{ asset('uploads/galeri/foto/' . $data->gambar) }}"
                                                        title="{{ $data->judul }}" data-gallery="portfolio-gallery-app"
                                                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div><!-- End Portfolio Item -->
                                    @endforeach
                                </div><!-- End Portfolio Container -->
                            </div>
                        </div>
                        {{--                       

                        <div class="container">
                            <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                                data-sort="original-order">
                                <ul class="portfolio-filters isotope-filters aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <li data-filter="*" class="filter-active">All</li>
                                    <li data-filter=".filter-app">App</li>
                                    <li data-filter=".filter-product">Product</li>
                                    <li data-filter=".filter-branding">Branding</li>
                                    <li data-filter=".filter-books">Books</li>
                                </ul><!-- End Portfolio Filters -->
                                <div class="row gy-4 isotope-container aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="200" style="position: relative; height: 4086px;">
                                    @foreach ($dataGaleri as $data)
                                        <div class="col-lg-3 col-md-4 portfolio-item isotope-item filter-app"
                                            style="position: absolute; left: 0px; top: 0px;">
                                            <div class="portfolio-content h-100">
                                                <img src="{{ asset('uploads/galeri/foto/' . $data->gambar) }}"
                                                    class="img-fluid" alt="">
                                                <div class="portfolio-info">
                                                    <h4>{{ $data->user->name }}</h4>
                                                    <p>{{ $data->judul }}</p>
                                                    <a href="{{ asset('uploads/galeri/foto/' . $data->gambar) }}"
                                                        title="{{ $data->judul }}" data-gallery="portfolio-gallery-app"
                                                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                </div>
                                            </div>
                                        </div><!-- End Portfolio Item -->
                                    @endforeach
                                </div><!-- End Portfolio Container -->

                            </div>
                        </div> --}}
                    </section>
                </div>
            </div>
        </div>

    </main>

    <footer id="footer" class="footer">
        <div class="footer-newsletter">
            <div class="container">
            </div>
        </div>
    </footer>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            var $grid = $('.isotope-container').isotope({
                itemSelector: '.portfolio-item',
                layoutMode: 'fitRows'
            });

            $('.portfolio-filters').on('click', 'li', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
                $('.portfolio-filters li').removeClass('filter-active');
                $(this).addClass('filter-active');
            });
        });
    </script>
@endpush
