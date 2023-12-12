@extends('users.layout.template')

@section('title', 'PWH | Home')

@section('content')
    <!-- Start retroy layout blog posts -->
    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @if (count($beritaHeadLine) > 0)                    
                    @foreach ($beritaHeadLine as $row)
                        @php
                            $originalString = htmlspecialchars_decode($row->isi);
                            $maxCharacters = 25;
                            $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                        @endphp
                        <div class="col-md-3">
                            <a href="{{ route('guest.berita', $row->slug) }}" class="h-entry mb-30 v-height gradient">
                                @if ($row->img)
                                    <div class="featured-img"
                                        style="background-image: url('{{ asset('assets/berita/images/' . $row->img) }}');"></div>
                                @endif

                                <div class="text">
                                    <span
                                        class="date">{{ \Carbon\Carbon::parse($row->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                    <h2 class="mb-2">{{ $row->judul }}</h2>
                                    {{-- <span class="text-white">
                                        @php
                                            echo $truncatedString;
                                        @endphp
                                    </span> --}}
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- End retroy layout blog posts -->

    <!-- Start posts-entry -->
    <section class="section posts-entry">
        <div class="container">
            {{-- <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Business</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div> --}}
            <div class="row g-3">
                <div class="col-md-9">
                    <div class="row g-3 retro-layout">
                        @if (count($beritaMidLineCol) > 0)
                            @foreach ($beritaMidLineCol as $berita)
                                @php
                                    $originalString = htmlspecialchars_decode($berita->isi);
                                    $maxCharacters = 25;
                                    $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                                @endphp
                                <div class="col-md-6">
                                    <div class="blog-entry">
                                        <a href="{{ route('guest.berita', $berita->slug) }}" class="h-entry mb-30 gradient"
                                            style="min-height: 300px;">
                                            @if ($berita->img)
                                                <div class="featured-img"
                                                    style="background-image: url('{{ asset('assets/berita/images/' . $berita->img) }}');">
                                                </div>
                                            @endif
                                        </a>
                                        <span
                                            class="date">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                        <h2><a href="{{ route('guest.berita', $berita->slug) }}">{{ $berita->judul }}</a>
                                        </h2>
                                        {{-- <p>{!! $truncatedString !!}</p> --}}
                                        <p><a href="{{ route('guest.berita', $berita->slug) }}"
                                                class="btn btn-sm btn-outline-primary">Read More</a></p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="list-unstyled blog-entry-sm">
                        @if (count($beritaMidLineRow) > 0)
                            @foreach ($beritaMidLineRow as $berita)
                                @php
                                    $originalString = htmlspecialchars_decode($berita->isi);
                                    $maxCharacters = 25;
                                    $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                                @endphp
                                <li>
                                    <span
                                        class="date">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                    <h3><a href="{{ route('guest.berita', $berita->slug) }}">{{ $berita->judul }}</a></h3>
                                    {{-- <p>{!! $truncatedString !!}</p> --}}
                                    <p><a href="{{ route('guest.berita', $berita->slug) }}" class="read-more">Continue
                                            Reading</a></p>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End posts-entry -->

    <!-- Start posts-entry -->
    <section class="section posts-entry posts-entry-sm bg-light">
        <div class="container">
            <div class="row retro-layout">
                @if (count($beritaMidLineCol2) > 0)
                    @foreach ($beritaMidLineCol2 as $berita)
                        @php
                            $originalString = htmlspecialchars_decode($berita->isi);
                            $maxCharacters = 25;
                            $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                        @endphp

                        <div class="col-md-6 col-lg-3">
                            <div class="blog-entry">
                                <a href="{{ route('guest.berita', $berita->slug) }}" class="h-entry mb-30 gradient"
                                    style="min-height: 300px;">
                                    <div class="featured-img">
                                        @if ($berita->img)
                                            <img src="{{ asset('assets/berita/images/' . $berita->img) }}" alt="Image"
                                                class="img-fluid">
                                        @endif
                                    </div>
                                </a>
                                <span
                                    class="date">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                <h2><a href="{{ route('guest.berita', $berita->slug) }}">{{ $berita->judul }}</a></h2>
                                {{-- <p>{!! $truncatedString !!}</p> --}}
                                <p><a href="{{ route('guest.berita', $berita->slug) }}" class="read-more">Continue
                                        Reading</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- End posts-entry -->

    <!-- Start posts-entry -->
    <section class="section posts-entry">
        <div class="container">
            {{-- <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Culture</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div> --}}
            <div class="row g-3 retro-layout">
                <div class="col-md-9 order-md-2">
                    <div class="row g-3">
                        @if (count($beritaBotLineCol) > 0)
                            @foreach ($beritaBotLineCol as $berita)
                                @php
                                    $originalString = htmlspecialchars_decode($berita->isi);
                                    $maxCharacters = 25;
                                    $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                                @endphp
                                <div class="col-md-6">
                                    <div class="blog-entry">
                                        <a href="{{ route('guest.berita', $berita->slug) }}" class="h-entry mb-30 gradient"
                                            style="min-height: 300px;">
                                            @if ($berita->img)
                                                <div class="featured-img"
                                                    style="background-image: url('{{ asset('assets/berita/images/' . $berita->img) }}');">
                                                </div>
                                            @endif
                                        </a>
                                        <span
                                            class="date">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                        <h2><a href="{{ route('guest.berita', $berita->slug) }}">{{ $berita->judul }}</a>
                                        </h2>
                                        {{-- <p>{!! $truncatedString !!}</p> --}}
                                        <p><a href="{{ route('guest.berita', $berita->slug) }}"
                                                class="btn btn-sm btn-outline-primary">Read More</a></p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="list-unstyled blog-entry-sm">
                        @if (count($beritaBotLineRow) > 0)
                            @foreach ($beritaBotLineRow as $berita)
                                <li>
                                    <span
                                        class="date">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                    <h2><a href="{{ route('guest.berita', $berita->slug) }}">{{ $berita->judul }}</a></h2>
                                    {{-- <p>{!! $truncatedString !!}</p> --}}
                                    <p><a href="{{ route('guest.berita', $berita->slug) }}"
                                            class="btn btn-sm btn-outline-primary">Continue Reading</a></p>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section">
        <div class="container">

            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Politics</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img
                                src="{{ asset('users/themes') }}/images/img_7_horizontal.jpg" alt="Image"
                                class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img
                                        src="{{ asset('users/themes') }}/images/person_1.jpg" alt="Image"
                                        class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
                                laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
                                aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img
                                src="{{ asset('users/themes') }}/images/img_6_horizontal.jpg" alt="Image"
                                class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img
                                        src="{{ asset('users/themes') }}/images/person_2.jpg" alt="Image"
                                        class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
                                laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
                                aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img
                                src="{{ asset('users/themes') }}/images/img_5_horizontal.jpg" alt="Image"
                                class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img
                                        src="{{ asset('users/themes') }}/images/person_3.jpg" alt="Image"
                                        class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
                                laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
                                aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img
                                src="{{ asset('users/themes') }}/images/img_4_horizontal.jpg" alt="Image"
                                class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img
                                        src="{{ asset('users/themes') }}/images/person_4.jpg" alt="Image"
                                        class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
                                laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
                                aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img
                                src="{{ asset('users/themes') }}/images/img_3_horizontal.jpg" alt="Image"
                                class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img
                                        src="{{ asset('users/themes') }}/images/person_5.jpg" alt="Image"
                                        class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
                                laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
                                aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img
                                src="{{ asset('users/themes') }}/images/img_2_horizontal.jpg" alt="Image"
                                class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img
                                        src="{{ asset('users/themes') }}/images/person_4.jpg" alt="Image"
                                        class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
                                laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
                                aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img
                                src="{{ asset('users/themes') }}/images/img_1_horizontal.jpg" alt="Image"
                                class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img
                                        src="{{ asset('users/themes') }}/images/person_3.jpg" alt="Image"
                                        class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
                                laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
                                aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img
                                src="{{ asset('users/themes') }}/images/img_4_horizontal.jpg" alt="Image"
                                class="img-fluid"></a>
                        <div class="excerpt">



                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img
                                        src="{{ asset('users/themes') }}/images/person_2.jpg" alt="Image"
                                        class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
                                laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
                                aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img
                                src="{{ asset('users/themes') }}/images/img_3_horizontal.jpg" alt="Image"
                                class="img-fluid"></a>
                        <div class="excerpt">



                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img
                                        src="{{ asset('users/themes') }}/images/person_5.jpg" alt="Image"
                                        class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor
                                laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo,
                                aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section> --}}

    <div class="section bg-light">
        <div class="container">

            {{-- <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Travel</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div> --}}

            <div class="row align-items-stretch">
                @if (count($beritaEndLine) > 0)
                    <div class="col-md-5 order-md-2 retro-layout">
                        <a href="{{ route('guest.berita', $beritaEndLine[0]->slug) }}" class="h-entry gradient" style="min-height: 480px;">
                            @if ($beritaEndLine[0]->img)
                                <div class="featured-img"
                                    style="background-image: url('{{ asset('assets/berita/images/' . $beritaEndLine[0]->img) }}');">
                                </div>
                            @endif
                            <div class="text">
                                <span
                                    class="date">{{ \Carbon\Carbon::parse($beritaEndLine[0]->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                <h2>{{ $beritaEndLine[0]->judul }}</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-7 retro-layout">
                        <a href="{{ route('guest.berita', $beritaEndLine[1]->slug) }}" class="h-entry v-height gradient">
                            @if ($beritaEndLine[1]->img)
                                <div class="featured-img"
                                    style="background-image: url('{{ asset('assets/berita/images/' . $beritaEndLine[1]->img) }}');">
                                </div>
                            @endif
                            <div class="text">
                                <span
                                    class="date">{{ \Carbon\Carbon::parse($beritaEndLine[1]->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                <h2>{{ $beritaEndLine[1]->judul }}</h2>
                            </div>
                        </a>
                        <div class="row mt-2">
                            <div class="col">
                                <a href="{{ route('guest.berita', $beritaEndLine[2]->slug) }}"
                                    class="h-entry v-height gradient">
                                    @if ($beritaEndLine[2]->img)
                                        <div class="featured-img"
                                            style="background-image: url('{{ asset('assets/berita/images/' . $beritaEndLine[2]->img) }}');">
                                        </div>
                                    @endif
                                    <div class="text">
                                        <span
                                            class="date">{{ \Carbon\Carbon::parse($beritaEndLine[2]->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                        <h2>{{ $beritaEndLine[2]->judul }}</h2>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('guest.berita', $beritaEndLine[3]->slug) }}"
                                    class="h-entry v-height gradient">
                                    @if ($beritaEndLine[3]->img)
                                        <div class="featured-img"
                                            style="background-image: url('{{ asset('assets/berita/images/' . $beritaEndLine[3]->img) }}');">
                                        </div>
                                    @endif
                                    <div class="text">
                                        <span
                                            class="date">{{ \Carbon\Carbon::parse($beritaEndLine[3]->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                        <h2>{{ $beritaEndLine[3]->judul }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
