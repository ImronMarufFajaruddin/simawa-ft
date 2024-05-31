<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('landings-template/assets/img/logo_ormawa/maskot.png') }}" alt="">
            <span>SIMAWAFT</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                {{-- <li><a class="getstarted scrollto" href="#hero">Beranda</a></li> --}}
                {{-- <li class="dropdown"><a href="#"><span>ORMAWA FT-UNIMAL</span>
                      <i class="bi bi-chevron-down"></i></a>
                  <ul>
                      @foreach ($dataKatInstansi as $data)
                          <li class="dropdown"><a href="#"><span>{{ $data->nama_kategori }}</span>
                                  <i class="bi bi-chevron-right"></i></a>
                              @foreach ($dataInstansi as $data)
                                  <ul>
                                      <li><a href=""></a>{{ $data->nama_instansi }}</li>
                                  </ul>
                              @endforeach
                          </li>
                      @endforeach
                  </ul>
              </li> --}}
                <li class="dropdown">
                    <a href="#"><span>ORMAWA FT-UNIMAL</span>
                        <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        {{-- @foreach ($dataKatInstansi as $kategori)
                            <li class="dropdown">
                                <a href="#"><span>{{ $kategori->nama_kategori }}</span>
                                    <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    @foreach ($kategori->instansis as $instansi)
                                        <li><a href="#">{{ $instansi->nama_instansi }}
                                                ({{ $instansi->nama_singkatan }})
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach --}}

                        <li class="dropdown">
                            <a href="#"><span>Instansi </span>
                                <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Nama Instansi
                                    </a>
                                </li>
                            </ul>

                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#tentangkami">Tentang Kami</a></li>
                <li><a class="nav-link scrollto" href="#artikel">Berita</a></li>
                <li><a class="nav-link scrollto" href="#galeri">Galeri</a></li>
                <li><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
