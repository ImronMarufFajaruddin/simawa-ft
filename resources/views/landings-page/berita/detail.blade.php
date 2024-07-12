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


        </div>
    </div>
@endSection
