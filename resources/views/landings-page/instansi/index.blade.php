@extends('landings-page.layouts.main')
@push('title')
    About - {{ $dataInstansi->nama_singkatan }}
@endpush

@section('content')
    <section id="hero" class="hero section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up" class="aos-init aos-animate">{{ $dataInstansi->nama_resmi }}
                    </h1>
                    <p data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
                        {{ Str::limit($dataInstansi->sejarah, 200) }}</p>
                    <div class="d-flex flex-column flex-md-row aos-init aos-animate" data-aos="fade-up"
                        data-aos-delay="200">
                        <a href="#sejarah" class="btn-get-started">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                        <a href="{{ $dataInstansi->instagram }}" target="__blank"
                            class="btn-get-started ms-0 ms-md-4 mt-4 mt-md-0 text-lowercase">{{ $dataInstansi->nama_singkatan }}<i
                                class="bi bi-instagram"></i></a>
                        <a href="{{ $dataInstansi->website_link }}" target="__blank"
                            class="btn-get-started ms-0 ms-md-4 mt-4 mt-md-0 text-lowercase"><i class="bi bi-globe"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img aos-init aos-animate" data-aos="zoom-out">
                    <img src="{{ asset('instansi/logo/' . $dataInstansi->logo) }}" class="img-fluid animated"
                        alt="">
                </div>
            </div>
        </div>
    </section>


    <!-- About Section -->
    <section id="sejarah" class="about section">
        <div class="container section-title" data-aos="fade-up">
            <p>Sejarah</p>
            <h2>Baca sejarah dari {{ $dataInstansi->nama_singkatan }} agar lebih mengenalnya</h2>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="row gx-0">
                <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>{{ $dataInstansi->nama_singkatan }}</h3>
                        <h2>
                            {{ $dataInstansi->nama_resmi }}
                        </h2>
                        <p>
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

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/about.jpg" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- /About Section -->
    <section id="team" class="team section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <p class="text-uppercase">kePengurusan</p>
            <h2>Periode</h2>
            <form action="{{ route('instansi.index', $dataInstansi->slug) }}" method="GET">
                <div class="row justify-content-md-center mt-3">
                    <div class="col-md-2">
                        {{-- <label for="tahun" class="form-label">Pilih Tahun Periode:</label> --}}
                        <select class="form-select" id="tahun" name="tahun" onchange="this.form.submit()">
                            <option value="">Pilih periode</option>
                            @foreach ($availableYears as $year)
                                <option value="{{ $year }}" @if ($year == $selectedYear) selected @endif>
                                    {{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div><!-- End Section Title -->

        <!-- Tampilan data anggota -->
        <div class="container">
            <div class="container section-title" data-aos="fade-up">
                <h2>Anggota {{ $selectedYear }}</h2>
            </div>
            <div class="row gy-4 justify-content-center">
                @foreach ($dataAnggota as $anggota)
                    <div class="col-lg-2 col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset($anggota->foto) }}" class="img-fluid force-square" alt="">
                                {{-- <div class="social">
                                    <a href="#"><i class="bi bi-twitter"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div> --}}
                            </div>
                            <div class="member-info">
                                <h4>{{ $anggota->nama }}</h4>
                                @if ($anggota->levelJabatan)
                                    <span class="font-italic">{{ $anggota->levelJabatan->nama_jabatan }}</span>
                                @else
                                    <span class="font-italic">Belum ditentukan</span>
                                @endif
                                <span>{{ $anggota->nim }}</span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>
        </div>
    </section><!-- /Team Section -->

    {{-- 
    <section id="team" class="team section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <p>Struktur Pengurus</p>
            <h2>{{ $dataInstansi->periode }}</h2>
        </div><!-- End Section Title -->

        <div class="container">
            @foreach ($dataLevelJabatan as $levelJabatan)
                @if (isset($anggotaByLevel[$levelJabatan->level]) && $anggotaByLevel[$levelJabatan->level]->isNotEmpty())
                    <div class="container section-title" data-aos="fade-up">
                        <h2>{{ $levelJabatan->nama_jabatan }}</h2>
                    </div>
                    <div class="row gy-4">
                        @foreach ($anggotaByLevel[$levelJabatan->level] as $anggota)
                            <div class="col-lg-3 col-md-4 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="team-member">
                                    <div class="member-img">
                                        <img src="{{ asset($anggota->foto) }}" class="img-fluid" alt="">
                                        <div class="social">
                                            <a href="#"><i class="bi bi-twitter"></i></a>
                                            <a href="#"><i class="bi bi-facebook"></i></a>
                                            <a href="#"><i class="bi bi-instagram"></i></a>
                                            <a href="#"><i class="bi bi-linkedin"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info">
                                        <h4>{{ $anggota->nama }}</h4>
                                        <span class="font-italic">{{ $levelJabatan->nama_jabatan }}</span>
                                        <span>{{ $anggota->nim }}</span>
                                    </div>
                                </div>
                            </div><!-- End Team Member -->
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </section><!-- /Team Section --> --}}


    {{-- 
    <section id="team" class="team section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <p>Struktur Pengurus</p>
            <h2>{{ $dataInstansi->periode }}</h2>
        </div><!-- End Section Title -->

        <!-- Loop through each level -->
        @foreach ($dataLevelJabatan as $levelJabatan)
            @if (isset($anggotaByLevel[$levelJabatan->level]) && $anggotaByLevel[$levelJabatan->level]->isNotEmpty())
                <div class="container">
                    <div class="container section-title" data-aos="fade-up">
                        <h2>{{ $levelJabatan->nama_jabatan }}</h2> <!-- Display the name of the position level -->
                    </div>
                    <div class="row gy-4">
                        @foreach ($anggotaByLevel[$levelJabatan->level] as $anggota)
                            <div class="col-lg-3 col-md-4 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="team-member">
                                    <div class="member-img">
                                        <img src="{{ asset($anggota->foto) }}" class="img-fluid" alt="">
                                        <div class="social">
                                            <a href="#"><i class="bi bi-twitter"></i></a>
                                            <a href="#"><i class="bi bi-facebook"></i></a>
                                            <a href="#"><i class="bi bi-instagram"></i></a>
                                            <a href="#"><i class="bi bi-linkedin"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info">
                                        <h4>{{ $anggota->nama }}</h4>
                                        <span class="font-italic">{{ $levelJabatan->nama_jabatan }}</span>
                                        <span>{{ $anggota->nim }}</span>
                                    </div>
                                </div>
                            </div><!-- End Team Member -->
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </section><!-- /Team Section --> --}}


    {{-- <section id="team" class="team section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <p>Struktur Pengurus</p>
            <h2>Tahun</h2>
        </div><!-- End Section Title -->

        <!--loop dari level jabatan dengan urutan pertama = ketua/wakil (enum, level ('1')), kedua = pengurus teras (enum, level ('2')), ketiga = kabid/stafsus (enum, level ('3')), keempat = anggota (enum, level ('4'))-->
        <div class="container">
            <div class="container section-title" data-aos="fade-up">
                <h2>Pengurus Inti</h2> <!--loop dari level jabatan punya level berapa-->
            </div>
            <div class="row gy-4 ">
                <div class="col-lg-2 col-md-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="{{ asset('landing-template/assets/img/team/team-1.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Walter White</h4> <!--ambil nama dari tabel anggota-->
                            <span class="font-italic">ketua</span> <!--ambil nama jabatan-->
                            <span>20201</span> <!--ambil nim dari tabel anggota->
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                        </div>
                    </div>


    </section><!-- /Team Section --> --}}
@endsection
