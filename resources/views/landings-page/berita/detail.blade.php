@extends('landings-page.layouts.main')

@push('title')
    Berita | {{ $dataBerita->slug }}
@endpush

@section('content')
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="/berita">Berita</a></li>
                        {{-- <li><a href="/berita">{{ $dataBerita->user->name }}</a></li> --}}
                        <li class="current">{{ $dataBerita->judul }}</li>
                    </ol>
                </div>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Blog Details Section -->
                <div id="blog-details" class="blog-details section">
                    <div class="container">
                        <article class="article">

                            <div class="post-img">
                                <img src="{{ asset('uploads/berita/foto/' . $dataBerita->gambar) }}" alt=""
                                    class="img-fluid mx-auto d-block">
                            </div>

                            <h2 class="title text-uppercase">{{ $dataBerita->judul }}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="#">{{ $dataBerita->user->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="#"><time
                                                datetime="2020-01-01">{{ $dataBerita->tanggal_publish }}</time></a></li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                {!! $dataBerita->konten !!}
                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">{{ $dataBerita->kategoriBerita->kategori_nama }}</a></li>
                                </ul>

                                <i class="bi bi-files"></i>
                                <ul class="tags">
                                    @if ($dataBerita->dokumen)
                                        <li>
                                            <a href="/uploads/berita/dokumen/{{ $dataBerita->dokumen }}" type="button"
                                                class="text-primary text-decoration-underline">
                                                Download
                                            </a>
                                        </li>
                                    @else
                                        <span>Tidak ada dokumen</span>
                                    @endif
                                    {{-- <li><a href="#">{{ $dataBerita->dokumen }}</a></li> --}}
                                </ul>
                            </div><!-- End meta bottom -->

                        </article>

                    </div>
                </div><!-- /Blog Details Section -->

            </div>
            {{-- 
            <div class="col-lg-4 sidebar">

                <div class="widgets-container">

                    <!-- Search Widget -->
                    <div class="search-widget widget-item">

                        <h3 class="widget-title">Search</h3>
                        <form action="">
                            <input type="text">
                            <button type="submit"><i class="bi bi-search"></i></button>
                        </form>

                    </div><!--/Search Widget -->

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">

                        <h3 class="widget-title">Categories</h3>
                        <ul class="mt-3">
                            <li><a href="#">General <span>(25)</span></a></li>
                            <li><a href="#">Lifestyle <span>(12)</span></a></li>
                            <li><a href="#">Travel <span>(5)</span></a></li>
                            <li><a href="#">Design <span>(22)</span></a></li>
                            <li><a href="#">Creative <span>(8)</span></a></li>
                            <li><a href="#">Educaion <span>(14)</span></a></li>
                        </ul>

                    </div><!--/Categories Widget -->

                    <!-- Recent Posts Widget -->
                    <div class="recent-posts-widget widget-item">

                        <h3 class="widget-title">Recent Posts</h3>

                        <div class="post-item">
                            <img src="assets/img/blog/blog-recent-1.jpg" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="assets/img/blog/blog-recent-2.jpg" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="assets/img/blog/blog-recent-3.jpg" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a>
                                </h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="assets/img/blog/blog-recent-4.jpg" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="assets/img/blog/blog-recent-5.jpg" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                    </div><!--/Recent Posts Widget -->

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

                    </div><!--/Tags Widget -->

                </div>

            </div> --}}

        </div>
    </div>
@endSection
