@extends('landings-page.layouts.main')

@push('title')
    Home - SIMAWA FT
@endpush

@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up " class="text-uppercase">
                            {{ $dataHero->title }}
                        </h1>
                        <div data-aos="fade-up" data-aos-delay="100" class="mb-3 mt-3">
                            {!! $dataHero->hero_deskripsi !!}
                        </div>

                        <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                            <a href="#tentangkami" class="btn-get-started">Selengkapnya <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        @if ($dataHero->logo)
                            <img src="{{ asset('landing/hero/logo/' . $dataHero->logo) }}" class="img-fluid animate"
                                alt="" />
                        @else
                            <img src="{{ asset('landing-template/assets/img/logo_ormawa/maskot.png') }}" alt="Logo"
                                class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- About Section -->
        <section id="tentangkami" class="about section">
            <div class="container" data-aos="fade-up">
                <div class="row gx-0">
                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>Tentang Kami</h3>
                            <h2>
                                @if ($dataHero->about_title)
                                    {{ $dataHero->about_title }}
                                @endif
                            </h2>
                            <p>
                                @if ($dataHero->about)
                                    {!! $dataHero->about !!}
                                @endif
                            </p>
                            {{-- <div class="text-center text-lg-start">
                                <a href="#"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Read More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div> --}}
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        @if ($dataHero->logo)
                            <img src="{{ asset('landing/hero/about/' . $dataHero->about_foto) }}" class="img-fluid"
                                alt="" />
                        @else
                            <img src="{{ asset('landing-template/assets/img/logo_ormawa/maskot.png') }}" alt="Logo"
                                class="img-fluid">
                        @endif
                        {{-- <img src="{{ asset('landing/hero/about/' . $dataHero->logo) }}" class="img-fluid" alt="" /> --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- /About Section -->

        <!-- Values Section -->
        <section id="ormawa" class="values section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <p>ORMAWA FT UNIMAL<br /></p>
                <h2>INSTANSI ORGANISASI MAHASISWA DALAM LINGKUP FAKULTAS TEKNIK</h2>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row gy-4 d-flex justify-content-center">
                    @foreach ($dataInstansi as $data)
                        <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                @if ($data->logo)
                                    <img src="{{ asset('instansi/logo/' . $data->logo) }}" class="img-fluid"
                                        alt="" />
                                @else
                                    <img src="{{ asset('landing-template/assets/img/logo_ormawa/maskot.png') }}"
                                        alt="Logo" class="img-fluid mx-auto d-block"
                                        style="width: 80%; height: 150px; object-fit: cover;">
                                @endif
                                <h3>{{ $data->nama_singkatan }}</h3>
                                <p>{!! Str::limit($data->sejarah, 50) !!}</p>
                                <a href="{{ route('instansi.index', ['slug' => $data->slug]) }}" class="read-more">
                                    <span>Selengkapnya</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <!-- End Card Item -->
                </div>
            </div>
        </section>
        <!-- /Values Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <!-- <p>We work with best clients<br /></p> -->
                <h2>LOGO</h2>
            </div>
            <!-- End Section Title -->

            {{-- @foreach ($dataInstansi as $data)
                <div class="swiper-slide">
                    <img src="{{ asset('instansi/logo/' . $data->logo) }}" class="img-fluid" alt="" />
                </div>
            @endforeach --}}
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper">
                    <script type="application/json" class="swiper-config">
                            {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                "slidesPerView": 2,
                                "spaceBetween": 40
                                },
                                "480": {
                                "slidesPerView": 3,
                                "spaceBetween": 60
                                },
                                "640": {
                                "slidesPerView": 4,
                                "spaceBetween": 80
                                },
                                "992": {
                                "slidesPerView": 6,
                                "spaceBetween": 120
                                }
                            }
                            }
                        </script>
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($dataInstansi as $data)
                            <div class="swiper-slide">
                                <img src="{{ asset('instansi/logo/' . $data->logo) }}" class="img-fluid" alt="" />
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>
        <!-- /Clients Section -->

        <!-- Recent Posts Section -->
        <section id="recent-posts" class="recent-posts section">
            <div class="container">
                <div class="container section-title">
                    <p class="text-uppercase">Berita</p>
                    <h2 class="text-uppercase">Berita terbaru dari keluarga teknik</h2>
                </div>
                <div class="row gy-5 d-flex justify-content-center">
                    @foreach ($dataBerita as $data)
                        <div class="col-xl-3 col-md-4">
                            <div class="post-item position-relative h-100">
                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ asset('uploads/berita/foto/' . $data->gambar) }}" class="img-fluid"
                                        style="width: 100%; height: 150px;" alt="" />
                                    <span
                                        class="post-date">{{ \Carbon\Carbon::parse($data->tanggal_publish)->locale('id')->isoFormat('D MMMM YYYY') }}</span>
                                </div>
                                <div class="post-content d-flex flex-column">
                                    <h3 class="post-title">{{ $data->judul }}</h3>
                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person"></i>
                                            <span class="ps-2">{{ $data->user->name }}</span>
                                        </div>
                                        <span class="px-3 text-black-50">/</span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-folder2"></i>
                                            <span class="ps-2">{{ $data->kategoriBerita->kategori_nama }}</span>
                                        </div>
                                    </div>
                                    <hr />
                                    <p>{!! Str::limit(strip_tags($data->konten), 50) !!}</p>
                                    <a href="{{ route('berita.show', ['slug' => $data->slug]) }}"
                                        class="readmore stretched-link">
                                        <span>Read More</span><i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End post item -->
                    @endforeach
                    <!-- End post item -->
                </div>
            </div>
        </section>
        <!-- /Recent Posts Section -->
    </main>
    <footer id="footer" class="footer">
        <div class="footer-newsletter">
            <div class="container">

                <div class="justify-content-center text-center">
                    <div class="col-lg-12">
                        <h4>Sekretariat</h4>
                        <p>
                            @if ($dataFooter->first()->alamat)
                                {{ $dataFooter->first()->alamat }}
                            @endif
                        </p>
                        <div class="card justify-content-center shadow border-none">
                            <iframe class="col-lg-12"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3563.957944963634!2d97.0603642023118!3d5.201640803080404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3047713cc5d31357%3A0xe39c619bdb0de168!2sFakultas%20Teknik%20Universitas%20Malikussaleh!5e0!3m2!1sid!2sid!4v1720020015123!5m2!1sid!2sid"
                                height="450" style="border-radius:4px;" allowfullscreen="true" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- <div class="maps">
        <div class="container section-title" data-aos="fade-up">
            <p class="text-uppercase">Sekretariat</p>
            <h2>Jl. Batam, Blang Pulo, Kec. Muara Satu, Kota Lhokseumawe Provinsi Aceh, Indonesia</h2>
        </div>
        <div class="maps footer-maps">
            <div class="row justify-content-center">
                <iframe class="frame-maps"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1833.5227125173271!2d97.06393004293221!3d5.200089144026092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3047713cc5d31357%3A0xe39c619bdb0de168!2sFakultas%20Teknik%20Universitas%20Malikussaleh!5e0!3m2!1sid!2sid!4v1707331051005!5m2!1sid!2sid"
                    width="400" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div> --}}
@endsection
