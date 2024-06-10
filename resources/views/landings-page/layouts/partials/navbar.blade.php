<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('landings-template/assets/img/logo_ormawa/maskot.png') }}" alt="">
            <span>SIMAWAFT</span>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/">Beranda</a></li>
                <li class="dropdown">
                    <a href="#"><span>ORMAWA FT-UNIMAL</span>
                        <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach ($dataKategoriInstansi as $kategori)
                            <li class="dropdown">
                                <a href="#"><span>{{ $kategori->kategori_nama }}</span>
                                    <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    @foreach ($kategori->instansi as $data)
                                        <li><a
                                                href="{{ route('instansi.index', ['slug' => $data->slug]) }}">{{ $data->nama_singkatan }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#tentangkami">Tentang Kami</a></li>
                <li><a class="nav-link scrollto" href="{{ route('berita.index') }}">Berita</a></li>
                <li><a class="nav-link scrollto" href="#galeri">Galeri</a></li>
                <li><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

{{-- <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('landings-template/assets/img/logo_ormawa/maskot.png') }}" alt="">
            <h1 class="sitename">SimawaFT</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Beranda<br></a></li>
                <li class="dropdown"><a href="#"><span>ORMAWA FT-UNIMAL</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @foreach ($dataKategoriInstansi as $kategori)
                            <li class="dropdown">
                                <a href="#"><span>{{ $kategori->kategori_nama }}</span>
                                    <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    @foreach ($kategori->instansi as $data)
                                        <li><a
                                                href="{{ route('instansi.index', ['slug' => $data->slug]) }}">{{ $data->nama_singkatan }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="#about" class="">Tentang Kami</a></li>
                <li><a href="#services">Berita</a></li>
                <li><a href="#portfolio">Galeri</a></li>
                <li><a href="#team">Kontak</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header> --}}
