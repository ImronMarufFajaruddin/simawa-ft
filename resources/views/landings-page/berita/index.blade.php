@extends('landings-page.layouts.main')

@section('content')
    <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="index.html">Home</a></li>
                <li class="current">Blog</li>
            </ol>
        </div>
    </nav>

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
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
                                            href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>

                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    {!! Str::limit(strip_tags($dataBerita[0]->konten), 200) !!}
                                </p>
                                <div class="read-more">
                                    <a href="{{ route('berita.show', ['id' => $dataBerita[0]->id]) }}">Baca Selengkapnya</a>
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
    </section>
@endsection
