@push('css')
    <style>

    </style>
@endpush
<footer id="footer" class="footer">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-6 col-md-8 footer-about">
                <a href="/" class="d-flex align-items-center">
                    <span class="sitename text-uppercase">{{ $dataHero->title }}</span>
                </a>
                @if (!$dataFooter->isEmpty())
                    <div class="footer-contact pt-3">
                        <p><i class="bi bi-geo-fill"></i>&nbsp;
                            {{ $dataFooter->first()->alamat }}
                        </p>
                        <p class="mt-3">
                            <strong>No. Telp:</strong> <span>{{ $dataFooter->first()->telp }}</span>
                        </p>
                        <p><strong>Email:</strong> <span>{{ $dataFooter->first()->email }}</span></p>
                    </div>
                @endif
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    @foreach ($dataFooter as $footer)
                        @if ($footer->useful_links && $footer->useful_links_title)
                            <li><i class="bi bi-chevron-right"></i>
                                <a href="{{ $footer->useful_links }}">{{ $footer->useful_links_title }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-4 col-md-12">
                <h4>Ikuti Kami</h4>
                {{-- <p>
                    Cras fermentum odio eu feugiat lide par naso tierra videa magna
                    derita valies
                </p> --}}
                <div class="social-links d-flex">

                    @foreach ($dataFooter as $footer)
                        @if ($footer->medsos_links && $footer->medsos_icon)
                            <a href="{{ $footer->medsos_links }}" target="__blank">{!! $footer->medsos_icon !!}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>
            © <span>Copyright</span>
            <strong class="px-1 sitename">IMF</strong>
            <span>All Rights Reserved</span>
        </p>
        <div class="credits">
            Developed by <a href="#">ImronMF</a>
        </div>
    </div>
</footer>
