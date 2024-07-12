@extends('landings-page.layouts.main')

@push('title')
    Berita
@endpush

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <nav class="breadcrumbs">
                    <div class="container">
                        <ol>
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="current">Berita</li>
                        </ol>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="container">
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
                                                    href="{{ route('berita.show', ['id' => $dataBerita[0]->id]) }}">{{ $dataBerita[0]->judul }}</a>
                                            </h2>

                                            <div class="meta-top">
                                                <ul>
                                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                            href="blog-single.html">Himasi unimal</a></li>
                                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                            href="blog-single.html"><time datetime="2020-01-01">Jan 1,
                                                                2020</time></a>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="content">
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
                                        <div class="col-lg-5 mb-3 position-relative h-100">
                                            <article>
                                                <div class="post-img">
                                                    <img src="{{ asset('uploads/berita/foto/' . $data->gambar) }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                                <h2 class="title">
                                                    <a
                                                        href="{{ route('berita.show', ['id' => $data->id]) }}">{{ $data->judul }}</a>
                                                </h2>

                                                <div class="meta-top">
                                                    <ul>
                                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                                            <a href="blog-single.html">Himasi unimal</a>
                                                        </li>
                                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                                href="blog-single.html"><time datetime="2020-01-01">Jan 1,
                                                                    2020</time></a>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div class="entry-content">
                                                    <p>
                                                        {!! Str::limit(strip_tags($data->konten), 100) !!}
                                                    </p>
                                                    <div class="read-more">
                                                        <a href="{{ route('berita.show', ['id' => $data->id]) }}">Baca
                                                            Selengkapnya</a>
                                                    </div>
                                                </div>
                                            </article><!-- End blog entry -->
                                        </div><!-- End col -->
                                    @endforeach
                                @else
                                    <p>No news articles found.</p>
                                @endif
                                {{-- <div class="col-12">
                                    <article>
                                        <div class="post-img">
                                            <img src="" alt="" class="img-fluid" />
                                        </div>

                                        <h2 class="title">
                                            <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
                                        </h2>

                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center">
                                                    <i class="bi bi-person"></i>
                                                    <a href="blog-details.html">John Doe</a>
                                                </li>
                                                <li class="d-flex align-items-center">
                                                    <i class="bi bi-clock"></i>
                                                    <a href="blog-details.html"><time datetime="2022-01-01">Jan 1,
                                                            2022</time></a>
                                                </li>
                                                <li class="d-flex align-items-center">
                                                    <i class="bi bi-chat-dots"></i>
                                                    <a href="blog-details.html">12 Comments</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="content">
                                            <p>
                                                Incidunt voluptate sit temporibus aperiam. Quia vitae
                                                aut sint ullam quis illum voluptatum et. Quo libero
                                                rerum voluptatem pariatur nam. Ad impedit qui officiis
                                                est in non aliquid veniam laborum. Id ipsum qui aut.
                                                Sit aliquam et quia molestias laboriosam. Tempora nam
                                                odit omnis eum corrupti qui aliquid excepturi
                                                molestiae. Facilis et sint quos sed voluptas. Maxime
                                                sed tempore enim omnis non alias odio quos distinctio.
                                            </p>
                                            <div class="read-more">
                                                <a href="blog-details.html">Read More</a>
                                            </div>
                                        </div>
                                    </article>
                                </div> --}}
                                <!-- End post list item -->

                            </div>
                            <!-- End blog posts list -->
                        </div>
                    </section>
                    <!-- /Blog Posts Section -->

                    <!-- Pagination 2 Section -->
                    <section id="pagination-2" class="pagination-2 section">
                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <ul>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
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
                            <h3 class="widget-title">Search</h3>
                            <form action="">
                                <input type="text" />
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                        <!--/Search Widget -->

                        <!-- Categories Widget -->
                        <div class="categories-widget widget-item">
                            <h3 class="widget-title">Kategori</h3>
                            <ul class="mt-3">
                                @foreach ($dataBerita as $data)
                                    <li>
                                        <a href="#">{{ $data->kategoriBerita->kategori_nama }} <span>(20)</span></a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <!--/Categories Widget -->


                        <!-- Tags Widget -->
                        <div class="tags-widget widget-item">
                            <h3 class="widget-title">Tags</h3>
                            <ul>
                                <li><a href="#">App</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Mac</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Studio</a></li>
                                <li><a href="#">Smart</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
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
