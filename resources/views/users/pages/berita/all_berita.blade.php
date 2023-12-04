@extends('users.layout.template')

@section('title', 'Home')

@section('content')
    <!-- Start retroy layout blog posts -->
    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @foreach ($beritaHeadline as $row)
                    @php
                        $originalString = htmlspecialchars_decode($row->isi);
                        $maxCharacters = 25;
                        $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                    @endphp
                    <div class="col-md-3">
                        <a href="{{ route('guest.berita', $row->slug) }}" class="h-entry mb-30 v-height gradient">
                            @php
                                if ($row->img) {
                                    echo "<div class='featured-img'
                                style='background-image: url(" .
                                        asset('assets/berita/images/' . $row->img) .
                                        ")';>
                            </div>";
                                }
                            @endphp


                            <div class="text">
                                <span
                                    class="date">{{ \Carbon\Carbon::parse($row->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                <h2 class="mb-2">{{ $row->judul }}</h2>
                                <span class="text-white">
                                    @php
                                        echo $truncatedString;
                                    @endphp
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach
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
                    <div class="row g-3">
                        @if (!empty($beritaMidLineCol))
                            @foreach ($beritaMidLineCol as $berita)
                                @php
                                    $originalString = htmlspecialchars_decode($berita->isi);
                                    $maxCharacters = 25;
                                    $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                                @endphp
                                <div class="col-md-6">
                                    <div class="blog-entry">
                                        @if ($berita->img)
                                            <a href="{{ route('guest.berita', $berita->slug) }}" class="img-link">
                                                <img src="{{ asset('assets/berita/images/' . $berita->img) }}"
                                                    alt="Image" class="img-fluid">
                                            </a>
                                        @endif
                                        <span
                                            class="date">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                        <h2><a href="{{ route('guest.berita', $berita->slug) }}">{{ $berita->judul }}</a>
                                        </h2>
                                        <p>{!! $truncatedString !!}</p>
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
                        @if (!empty($beritaMidLineRow))
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
                                    <p>{!! $truncatedString !!}</p>
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
            <div class="row">
                @if (!empty($beritaMidLineCol2))
                    @foreach ($beritaMidLineCol2 as $berita)
                        @php
                            $originalString = htmlspecialchars_decode($berita->isi);
                            $maxCharacters = 25;
                            $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                        @endphp

                        <div class="col-md-6 col-lg-3">
                            <div class="blog-entry">
                                @if ($berita->img)
                                    <a href="{{ route('guest.berita', $berita->slug) }}" class="img-link">
                                        <img src="{{ asset('assets/berita/images/' . $berita->img) }}" alt="Image"
                                            class="img-fluid">
                                    </a>
                                @endif
                                <span
                                    class="date">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                <h2><a href="{{ route('guest.berita', $berita->slug) }}">{{ $berita->judul }}</a></h2>
                                <p>{!! $truncatedString !!}</p>
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
            <div class="row g-3">
                <div class="col-md-9 order-md-2">
                    <div class="row g-3">
                        @if (!empty($beritaBotLineCol))
                            @foreach ($beritaBotLineCol as $berita)
                                @php
                                    $originalString = htmlspecialchars_decode($berita->isi);
                                    $maxCharacters = 25;
                                    $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                                @endphp
                                <div class="col-md-6">
                                    <div class="blog-entry">
                                        @if ($berita->img)
                                            <a href="{{ route('guest.berita', $berita->slug) }}" class="img-link">
                                                <img src="{{ asset('assets/berita/images/' . $berita->img) }}"
                                                    alt="Image" class="img-fluid">
                                            </a>
                                        @endif
                                        </a>
                                        <span
                                            class="date">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                        <h2><a href="{{ route('guest.berita', $berita->slug) }}">{{ $berita->judul }}</a>
                                        </h2>
                                        <p>{!! $truncatedString !!}</p>
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
                        @if (!empty($beritaBotLineRow))
                            @foreach ($beritaBotLineRow as $berita)
                                <li>
                                    <span
                                        class="date">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                    <h2><a href="{{ route('guest.berita', $berita->slug) }}">{{ $berita->judul }}</a></h2>
                                    <p>{!! $truncatedString !!}</p>
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

            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Travel</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>

            <div class="row align-items-stretch retro-layout-alt">

                <div class="col-md-5 order-md-2">
                    <a href="single.html" class="hentry img-1 h-100 gradient">
                        <div class="featured-img"
                            style="background-image: url('{{ asset('users/themes') }}/images/img_2_vertical.jpg');">
                        </div>
                        <div class="text">
                            <span>February 12, 2019</span>
                            <h2>Meta unveils fees on metaverse sales</h2>
                        </div>
                    </a>
                </div>

                <div class="col-md-7">

                    <a href="single.html" class="hentry img-2 v-height mb30 gradient">
                        <div class="featured-img"
                            style="background-image: url('{{ asset('users/themes') }}/images/img_1_horizontal.jpg');">
                        </div>
                        <div class="text text-sm">
                            <span>February 12, 2019</span>
                            <h2>AI can now kill those annoying cookie pop-ups</h2>
                        </div>
                    </a>

                    <div class="two-col d-block d-md-flex justify-content-between">
                        <a href="single.html" class="hentry v-height img-2 gradient">
                            <div class="featured-img"
                                style="background-image: url('{{ asset('users/themes') }}/images/img_2_sq.jpg');">
                            </div>
                            <div class="text text-sm">
                                <span>February 12, 2019</span>
                                <h2>Don’t assume your user data in the cloud is safe</h2>
                            </div>
                        </a>
                        <a href="single.html" class="hentry v-height img-2 ms-auto float-end gradient">
                            <div class="featured-img"
                                style="background-image: url('{{ asset('users/themes') }}/images/img_3_sq.jpg');">
                            </div>
                            <div class="text text-sm">
                                <span>February 12, 2019</span>
                                <h2>Startup vs corporate: What job suits you best?</h2>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
