@extends('landings-page.layouts.main')

@section('content')
    {{-- Section Sejarah --}}
    {{-- 
    <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="index.html">Home</a></li>
                <li class="current">Blog</li>
            </ol>
        </div>
    </nav> --}}

    <section id="hero" class="hero section">
        <div class="container">
            {{-- <header class="custom-header text-center">
                <h2 class="text-uppercase">{{ $dataInstansi->nama_singkatan }}</h2>
                <p class="mt-2">{{ $dataInstansi->nama_resmi }}</p>
            </header> --}}
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up" class="aos-init aos-animate">{{ $dataInstansi->nama_resmi }}
                    </h1>
                    <p data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
                        {{ Str::limit($dataInstansi->sejarah, 200) }}</p>
                    <div class="d-flex flex-column flex-md-row aos-init aos-animate" data-aos="fade-up"
                        data-aos-delay="200">
                        <a href="#sejarah" class="btn-get-started">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                        {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                            class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img aos-init aos-animate" data-aos="zoom-out">
                    <img src="{{ asset('instansi/logo/' . $dataInstansi->logo) }}" class="img-fluid animated"
                        alt="">
                </div>
            </div>
        </div>

    </section>
    {{-- <section id="about-instansi" class="about-instansi align-items-center">
        <div class="container" data-aos="fade-up">
            <header class="custom-header mb-4 text-center">
                <h2 class="text-uppercase">{{ $dataInstansi->nama_singkatan }}</h2>
                <p class="mt-2">{{ $dataInstansi->nama_resmi }}</p>
            </header>

            <div class="row mt-4 mb-4 justify-content-center align-content-center">
                <p class="text-center" style="color: #012970; font-size: 38px; font-weight: 400;">Sejarah</p>
            </div>

            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <p data-aos="fade-up" data-aos-delay="400">{{ $dataInstansi->sejarah }} </p>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#about"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span class="text-uppercase">Berita dari {{ $dataInstansi->nama_singkatan }}</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 about-instansi-img text-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('instansi/logo/' . $dataInstansi->logo) }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section> --}}



    <section id="sejarah" class="about section">
        <header class="section-header">
            <p>Sejarah</p>
            <h3 class="mt-3">Baca sejarah dari {{ $dataInstansi->nama_singkatan }} agar lebih mengenalnya</h3>
        </header>
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-12 d-flex flex-column justify-content-center aos-init aos-animate" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="content">
                        <h3>{{ $dataInstansi->nama_singkatan }}</h3>
                        <h2>{{ $dataInstansi->nama_resmi }}</h2>
                        <p class="text-justify">
                            {{ $dataInstansi->sejarah }}
                        </p>
                        <div class="text-center text-lg-start">
                            <a href="#"
                                class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Read More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-2 d-flex align-items-center aos-init aos-animate" data-aos="zoom-out"
                    data-aos-delay="200">
                    <img src="{{ asset('instansi/logo/' . $dataInstansi->logo) }}" class="img-fluid" alt="">
                </div> --}}

            </div>
        </div>

    </section>

    {{-- Section Struktur Organisasi --}}
    <section id="team" class="team-custom align-content-center py-5">
        <div class="container" data-aos="fade-up">
            <header class="custom-header mb-4 text-center">
                <h2 class="text-uppercase">Struktur Pengurus</h2>
                {{-- buat di database untuk struktur pengurus ada field untuk periode dan nama kabinet --}}
                <p class="mt-2">Periode 2023</p>
            </header>

            {{-- Loop untuk struktur pengurus --}}
            <div class="row gy-4 justify-content-center align-item-center text-center">
                <div class="col-lg-12">
                    <h4 class="mb-3"> Pengurus inti</h4>
                </div>
            </div>
            <div class="row gy-4 justify-content-center align-item-center">
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="anggota">
                        <div class="anggota-img">
                            <img src="{{ asset('landings-template/assets/img/person.jpg') }}" class="card-img-top"
                                alt="imf-fluid">
                            <div class="info">
                                <h6>Imron Ma'ruf Fajaruddin</h6>
                                <p class="mb-3">Jabatan apa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-4 justify-content-center align-item-center mt-4">
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="anggota">
                        <div class="anggota-img">
                            <img src="{{ asset('landings-template/assets/img/person.jpg') }}" class="card-img-top"
                                alt="imf-fluid">
                            <div class="info">
                                <h6>Imron Ma'ruf Fajaruddin</h6>
                                <p class="mb-3">Jabatan apa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
