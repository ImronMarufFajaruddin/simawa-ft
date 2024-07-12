<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('landing-template/assets/img/logo_ormawa/maskot.png') }}" alt="" />
            <h1 class="sitename">SIMAWA FT</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li>
                    <a href="/" class="active">Beranda<br /></a>
                </li>

                <li class="dropdown">
                    <a href="#"><span>ORMAWA FT-UNIMAL</span>
                        <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>

                        @foreach ($dataKategoriInstansi as $kategori)
                            <li class="dropdown">
                                <a href="#ormawa"><span>{{ $kategori->kategori_nama }}</span>
                                    <i class="bi bi-chevron-right toogle-dropdown"></i></a>
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
                <li><a href="{{ url('/') }}#tentangkami">Tentang Kami</a></li>
                <li><a href="{{ route('berita.index') }}">Berita</a></li>
                <li><a href="#galeri">Galeri</a></li>

                <li><a href="#kontak">Kontak</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <!-- <a class="btn-getstarted flex-md-shrink-0" href="index.html#about"
        >Get Started</a> -->
    </div>
</header>
