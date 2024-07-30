<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('landing-template/assets/img/logo_ormawa/maskot.png') }}" alt="Logo" />
            <h1 class="sitename">SIMAWA FT</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Beranda
                    </a></li>
                {{-- <li>
                    <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Beranda</a>
                </li> --}}


                <li class="dropdown">
                    <a href="#"><span>ORMAWA FT-UNIMAL</span>
                        <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @foreach ($dataKategoriInstansi as $kategori)
                            <li class="dropdown">
                                <a href="#"><span>{{ $kategori->kategori_nama }}</span>
                                    <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    @foreach ($kategori->instansi as $data)
                                        <li><a href="{{ route('instansi.index', ['slug' => $data->slug]) }}"
                                                class="{{ Request::is('instansi/' . $data->slug) ? 'active' : '' }}">{{ $data->nama_singkatan }}</a>
                                        </li>
                                    @endforeach
                                    {{-- <li><a href="#">Deep Dropdown 1</a></li> --}}
                                </ul>
                            </li>
                        @endforeach

                    </ul>
                </li>

                {{-- <li class="dropdown">
                    <a href="#"><span>ORMAWA FT-UNIMAL</span>
                        <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @foreach ($dataKategoriInstansi as $kategori)
                            <li class="dropdown">
                                <a href="#"><span>{{ $kategori->kategori_nama }}</span>
                                    <i class="bi bi-chevron-right toogle-dropdown"></i></a>
                                <ul>
                                    @foreach ($kategori->instansi as $data)
                                        <li><a href="{{ route('instansi.index', ['slug' => $data->slug]) }}"
                                                class="{{ Request::is('instansi/' . $data->slug) ? 'active' : '' }}">{{ $data->nama_singkatan }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li> --}}
                <li><a href="{{ url('/') }}#tentangkami"
                        class="{{ Request::is('tentangkami') ? 'active' : '' }}">Tentang Kami</a></li>
                <li><a href="{{ route('berita.index') }}"
                        class="{{ Request::is('berita*') ? 'active' : '' }}">Berita</a></li>
                <li><a href="{{ route('gallery.index') }}"
                        class="{{ Request::is('gallery*') ? 'active' : '' }}">Galeri</a></li>
                <li><a href="{{ route('kontak.index') }}"
                        class="{{ Request::is('kontak*') ? 'active' : '' }}">Kontak</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>
