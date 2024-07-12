@extends('landings-page.layouts.main')

@push('title')
    Berita
@endpush
@push('css')
    <style>
        .title {
            text-align: center;
            padding-bottom: 0px;
            position: relative;
        }

        .title h2 {
            font-size: 13px;
            letter-spacing: 1px;
            font-weight: 700;
            padding: 8px 20px;
            margin: 0;
            background: color-mix(in srgb, var(--accent-color), transparent 90%);
            color: var(--accent-color);
            display: inline-block;
            text-transform: uppercase;
            border-radius: 50px;
            font-family: var(--default-font);
        }

        .title p {
            color: var(--heading-color);
            margin: 0;
            font-size: 32px;
            font-weight: 700;
            font-family: var(--heading-font);
        }
    </style>
@endpush

@section('content')
    <main class="main">
        <!-- Page Title -->

        <div class="page-title aos-init aos-animate" data-aos="fade">
            <div class="heading">
                <div class="container">
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li class="current">Berita</li>
                    </ol>
                </div>
            </nav>
        </div>
        <!-- End Page Title -->

        <div class="container">
            <div class="title text-center">
                <p class="text-uppercase font-weight">Berita</p>
                <h2> Berita Ormawa Fakultas Teknik </h2>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Posts Section -->
                    <section id="blog-posts" class="blog-posts section">
                        <div class="container">
                            <div class="row gy-5">
                                @if ($dataBerita->count() > 0)
                                    <!-- Berita Utama -->
                                    <div class="col-12">
                                        <article>
                                            <div class="post-img">
                                                <img src="{{ asset('uploads/berita/foto/' . $dataBerita[0]->gambar) }}"
                                                    alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                            <h2 class="title">
                                                <a
                                                    href="{{ route('berita.show', ['slug' => Str::slug($dataBerita[0]->judul)]) }}">
                                                    {{ $dataBerita[0]->judul }}
                                                </a>
                                            </h2>
                                            <div class="meta-top">
                                                <ul>
                                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                            href="blog-single.html">{{ $dataBerita[0]->user->name }}</a>
                                                    </li>
                                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                            href="blog-single.html"><time
                                                                datetime="2020-01-01">{{ $dataBerita[0]->tanggal_publish }}</time></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="content">
                                                <p>
                                                    {!! Str::limit(strip_tags($dataBerita[0]->konten), 200) !!}
                                                </p>
                                                <div class="read-more">
                                                    <a
                                                        href="{{ route('berita.show', ['slug' => Str::slug($dataBerita[0]->judul)]) }}">Baca
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </article><!-- End blog entry -->
                                    </div><!-- End col -->

                                    <!-- Berita Lainnya -->
                                    @foreach ($dataBerita->slice(1, 8) as $data)
                                        <div class="col-lg-6 mM-1 position-relative">
                                            <article>
                                                <div class="post-img">
                                                    <img src="{{ asset('uploads/berita/foto/' . $data->gambar) }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                                <h2 class="title">
                                                    <a
                                                        href="{{ route('berita.show', ['slug' => Str::slug($data->judul)]) }}">
                                                        {{ $data->judul }}
                                                    </a>
                                                </h2>
                                                <div class="meta-top">
                                                    <ul>
                                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                                            <a href="blog-single.html">{{ $data->user->name }}</a>
                                                        </li>
                                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                                href="blog-single.html"><time
                                                                    datetime="2020-01-01">{{ $data->tanggal_publish }}</time></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="entry-content">
                                                    <p>
                                                        {!! Str::limit(strip_tags($data->konten), 100) !!}
                                                    </p>
                                                    <div class="read-more">
                                                        <a
                                                            href="{{ route('berita.show', ['slug' => Str::slug($data->judul)]) }}">Baca
                                                            Selengkapnya</a>
                                                    </div>
                                                </div>
                                            </article><!-- End blog entry -->
                                        </div><!-- End col -->
                                    @endforeach
                                @else
                                    <p>Belum ada berita dari <span class="text-uppercase"> {{ $namaSingkatan }}.</span></p>
                                @endif
                            </div><!-- End row -->

                        </div><!-- End container -->
                    </section><!-- End section -->

                    <!-- Pagination 2 Section -->
                    <section id="pagination-2" class="pagination-2 section">
                        <div class="container">

                            <div class="d-flex justify-content-center">
                                <ul>
                                    <!-- Tombol Previous -->
                                    @if ($dataBerita->onFirstPage())
                                        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $dataBerita->previousPageUrl() }}">&laquo;</a></li>
                                    @endif

                                    <!-- Nomor Halaman -->
                                    @foreach ($dataBerita->getUrlRange(1, $dataBerita->lastPage()) as $page => $url)
                                        @if ($page == $dataBerita->currentPage())
                                            <li class="page-item active"><a class="page-link"
                                                    href="{{ $url }}">{{ $page }}</a></li>
                                        @else
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                    <!-- Tombol Next -->
                                    @if ($dataBerita->hasMorePages())
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $dataBerita->nextPageUrl() }}">&raquo;</a></li>
                                    @else
                                        <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </section>
                    <!-- /Pagination 2 Section -->
                </div>

                <div class="col-lg-4 sidebar">
                    <div class="widgets-container">

                        <!-- Search Widget -->
                        <div class="search-widget widget-item">
                            <h3 class="widget-title">Cari..</h3>
                            <form action="{{ route('berita.index') }}" method="GET">
                                <input type="text" name="search" value="{{ request('search') }}" />
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                        <!--/Search Widget -->

                        <!-- Categories Widget -->
                        <div class="categories-widget widget-item">
                            <h3 class="widget-title">Kategori</h3>
                            <ul class="mt-3">
                                @foreach ($dataKategoriBerita as $data)
                                    <li>
                                        <a href="{{ route('berita.index', ['kategori' => $data->kategori_nama]) }}">
                                            {{ $data->kategori_nama }}
                                            <span>({{ $data->berita->count() }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--/Categories Widget -->

                        <!-- Tags Widget -->
                        <div class="tags-widget widget-item">
                            <h3 class="widget-title">Berita Instansi</h3>
                            <ul>
                                <li>
                                    <a class="{{ !request()->has('from') ? 'active' : '' }}"
                                        href="{{ url('berita') }}">Semua</a>
                                    @foreach ($dataInstansi as $data)
                                        <a class="{{ request()->query('from') == strtolower($data->nama_singkatan) ? 'active' : '' }}"
                                            href="{{ url('berita?from=' . urlencode(strtolower($data->nama_singkatan))) }}">{{ $data->nama_singkatan }}</a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <!--/Tags Widget -->
                    </div>
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



    {{-- <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="index.html">Home</a></li>
                <li class="current">Blog</li>
            </ol>
        </div>
    </nav> --}}

    <!-- ======= Blog Section ======= -->
    {{-- <section id="blog" class="blog">
        <div class="container">
            <div class="col-lg-12">
                <div class="sidebar">
                    <h3 class="sidebar-title">Cari</h3>
                    <div class="sidebar-item search-form">
                        <form action="">
                            <input type="text">
                            <button type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!-- End sidebar search formn-->
                </div><!-- End sidebar -->
            </div><!-- End blog sidebar -->
        </div>

        <div class="container" data-aos="fade-up">
            <div class="row mt-5 d-flex flex-wrap">
                @if ($dataBerita->count() > 0)
                    <!-- Berita Utama -->
                    <div class="col-lg-12">
                        <article class="entry">
                            <div class="entry-img">
                                <img src="{{ asset('uploads/berita/foto/' . $dataBerita[0]->gambar) }}" alt=""
                                    class="img-fluid mx-auto d-block">
                            </div>
                            <h2 class="entry-title">
                                <a
                                    href="{{ route('berita.show', ['id' => $dataBerita[0]->id]) }}">{{ $dataBerita[0]->judul }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="blog-single.html">Himasi unimal</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a>
                                    </li>

                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    {!! Str::limit(strip_tags($dataBerita[0]->konten), 200) !!}
                                </p>
                                <div class="read-more">
                                    <a href="{{ route('berita.show', ['id' => $dataBerita[0]->id]) }}">Baca
                                        Selengkapnya</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    </div><!-- End blog entries list -->

                    <!-- Berita Lainnya -->
                    @foreach ($dataBerita->slice(1, 8) as $data)
                        <div class="col-lg-3 mb-4 position-relative h-100">
                            <article class="entry">
                                <div class="entry-img">
                                    <img src="{{ asset('uploads/berita/foto/' . $data->gambar) }}" alt=""
                                        class="img-fluid mx-auto d-block">
                                </div>
                                <h2 class="entry-title">
                                    <a href="{{ route('berita.show', ['id' => $data->id]) }}">{{ $data->judul }}</a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-single.html">Himasi unimal</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        {!! Str::limit(strip_tags($data->konten), 100) !!}
                                    </p>
                                    <div class="read-more">
                                        <a href="{{ route('berita.show', ['id' => $data->id]) }}">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </article><!-- End blog entry -->
                        </div><!-- End col -->
                    @endforeach
                @else
                    <p>No news articles found.</p>
                @endif
            </div>
        </div>
    </section> --}}
@endsection
