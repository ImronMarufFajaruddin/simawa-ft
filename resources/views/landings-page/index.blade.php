@extends('landings-page.layouts.main')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">SIMAWA-FT</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Selamat datang di Sistem Informasi Organaisasi
                        Kemahasiswaan Fakukltas Teknik Universitas Malikussaleh.<br>Selamat dan semangat untuk mengenal
                        lebih dalam dengan ORMAWA FT-UNIMAL</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#about"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Get Started</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('landings-template/assets/img/logo_ormawa/maskot.png') }}" class="img-fluid"
                        alt="">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <section id="tentangkami" class="tentangkami">
        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>Who We Are</h3>
                        <h2>Expedita voluptas omnis cupiditate totam eveniet nobis sint iste. Dolores est repellat corrupti
                            reprehenderit.</h2>
                        <p>
                            Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor
                            consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam et est
                            corrupti.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ 'landings-template/assets/img/about.jpg' }}" class="img-fluid" alt="">
                </div>

            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= ORMAWA Section ======= -->
    <section id="ormawa" class="pricing">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>ORMAWA FT-UNIMAL</p>
                <h2 class="mt-3">Instansi Organisasi Mahasiswa dalam Lingkup Fakultas Teknik</h2>
            </header>
            <div class="row gy-4" data-aos="fade-left">
                {{-- @foreach ($dataInstansi as $data) --}}
                <div class="col-lg-3 col-md-12" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box">
                        {{-- <h3 style="color: #0040ff;">{{ $data->nama_singkatan }}</h3> --}}
                        <h3 style="color: #0040ff;">Nama Singkatan</h3>
                        <img src="{{ asset('landings-template/assets/img/logo_ormawa/himasi.png') }}" class="img-fluid"
                            alt="">
                        {{-- <p>{{ $data->nama_instansi }}</p> --}}
                        <p>Nama Instansi</p>
                        <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                {{-- @endforeach --}}
                {{-- <div class="col-lg-3 col-md-12" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box">
                        <h3 style="color: #0040ff;">HIMASI UNIMAL</h3>
                        <img src="{{ asset('frontend/assets/img/logo_ormawa/himasi.png') }}" class="img-fluid"
                            alt="">
                        <p>Himpunan Mahasiswa Sistem Informasi Universitas Malikussaleh</p>
                        <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box">
                        <h3 style="color: #0040ff;">HIMASI UNIMAL</h3>
                        <img src="{{ asset('frontend/assets/img/logo_ormawa/himasi.png') }}" class="img-fluid"
                            alt="">
                        <p>Himpunan Mahasiswa Sistem Informasi Universitas Malikussaleh</p>
                        <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box">
                        <h3 style="color: #0040ff;">HIMASI UNIMAL</h3>
                        <img src="{{ asset('frontend/assets/img/clients/himasi _logo.png') }}" class="img-fluid"
                            alt="">
                        <p>Himpunan Mahasiswa Sistem Informasi Universitas Malikussaleh</p>
                        <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div> --}}

            </div>

        </div>

    </section><!-- End ORMAWA Section -->


    <!-- ======= Logo Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="{{ 'landings-template/assets/img/logo_ormawa/DPM.png' }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ 'landings-template/assets/img/logo_ormawa/himatesin.png' }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ 'landings-template/assets/img/logo_ormawa/himatesip.png' }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ 'landings-template/assets/img/logo_ormawa/himti.png' }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ 'landings-template/assets/img/logo_ormawa/himatemia.png' }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ 'landings-template/assets/img/logo_ormawa/himatro.png' }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ 'landings-template/assets/img/logo_ormawa/himateka.png' }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ 'landings-template/assets/img/logo_ormawa/himatif.png' }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ 'landings-template/assets/img/logo_ormawa/himasi.png' }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ 'landings-template/assets/img/logo_ormawa/himaterial.png' }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ 'landings-template/assets/img/logo_ormawa/client-1.png' }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img
                            src="{{ 'landings-template/assets/img/logo_ormawa/himasi _logo.png' }}" class="img-fluid"
                            alt="">
                    </div>
                </div>
                <div class="mt-5 swiper-pagination"></div>
            </div>
        </div>

    </section><!-- End Logo Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Berita</p>
                {{-- <h2>Blog</h2> --}}
            </header>

            <div class="row">

                <div class="col-lg-3">
                    <div class="post-box">
                        <div class="post-img"><img src="{{ asset('landings-template/assets/img/blog/blog-1.jpg') }}"
                                class="img-fluid" alt="">
                        </div>
                        <span class="post-date">15 Januari 2024</span>
                        <h3 class="post-title">Ini ceritanya judul</h3>
                        <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Selengkapnya</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="post-box">
                        <div class="post-img"><img src="{{ asset('landings-template/assets/img/blog/blog-1.jpg') }}"
                                class="img-fluid" alt="">
                        </div>
                        <span class="post-date">15 Januari 2024</span>
                        <h3 class="post-title">Ini ceritanya judul</h3>
                        <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Selengkapnya</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="post-box">
                        <div class="post-img"><img src="{{ asset('landings-template/assets/img/blog/blog-1.jpg') }}"
                                class="img-fluid" alt="">
                        </div>
                        <span class="post-date">15 Januari 2024</span>
                        <h3 class="post-title">Ini ceritanya judul</h3>
                        <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Selengkapnya</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="post-box">
                        <div class="post-img"><img src="{{ asset('landings-template/assets/img/blog/blog-1.jpg') }}"
                                class="img-fluid" alt="">
                        </div>
                        <span class="post-date">15 Januari 2024</span>
                        <h3 class="post-title">Ini ceritanya judul</h3>
                        <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Selengkapnya</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="maps">
        <div class="footer-maps">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h4 class="text-uppercase">Sekretariat</h4>
                        <p>Jl. Batam, Blang Pulo, Kec. Muara Satu, Kota Lhokseumawe
                            Provinsi Aceh, Indonesia</p>
                    </div>
                    <iframe class="frame-maps"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1833.5227125173271!2d97.06393004293221!3d5.200089144026092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3047713cc5d31357%3A0xe39c619bdb0de168!2sFakultas%20Teknik%20Universitas%20Malikussaleh!5e0!3m2!1sid!2sid!4v1707331051005!5m2!1sid!2sid"
                        width="400" height="600" style="border:20;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
