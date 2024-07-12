@extends('landings-page.layouts.main')
@push('title')
    Kontak
@endpush
@push('css')
    <style>
        .social-link {
            width: 30px;
            height: 30px;
            border: 1px solid #414ddf;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #151947;
            border-radius: 50%;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .social-link:hover,
        .social-link:focus {
            background: #414ddf;
            text-decoration: none;
            color: #eeeeee;
        }
    </style>
@endpush
@section('content')
    <main class="main">
        <div class="page-title aos-init aos-animate" data-aos="fade">
            <div class="heading">
                <div class="container">
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li class="current">Galeri ORMAWA</li>
                    </ol>
                </div>
            </nav>
        </div>

        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <p class="text-uppercase">Kontak</p>
            <h2>Informasi Kontak dan Media Sosial ORMAWA</h2>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row mt-4 text-center">
                @foreach ($dataInstansi as $data)
                    <!-- Team item -->
                    <div class="col-lg-2 col-sm-6 mb-5">
                        <div class="bg-white rounded shadow-sm py-4 px-3">
                            @if ($data->logo)
                                <img src="{{ asset('instansi/logo/' . $data->logo) }}" alt="Logo" width="100"
                                    class="img-fluid  mb-3 img-thumbnail">
                            @else
                                <img src="{{ asset('landing-template/assets/img/logo_ormawa/maskot.png') }}" alt="Logo"
                                    width="100" class="img-fluid mb-3 img-thumbnail">
                            @endif
                            <h5 class="mb-0">{{ $data->nama_singkatan }}</h5>
                            <span class="small text-uppercase text-muted">{{ $data->no_telp }}</span>

                            <ul class="social mb-0 list-inline mt-3">
                                @if ($data->website_link)
                                    <li class="list-inline-item"><a href="{{ $data->website_link }}" class="social-link"
                                            target="__blank"><i class="bi bi-globe-asia-australia"></i></a></li>
                                @endif
                                @if ($data->instagram)
                                    <li class="list-inline-item"><a href="{{ $data->instagram }}" class="social-link"><i
                                                class="bi bi-instagram" target="__blank"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div><!-- End -->
                @endforeach
            </div>
        </div>
    </main>

    <footer id="footer" class="footer">
        <div class="footer-newsletter">
            <div class="container">
            </div>
        </div>
    </footer>
@endsection
