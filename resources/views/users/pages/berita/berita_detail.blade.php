@extends('users.layout.template')

@section('title', 'Home')

@section('content')
    <!-- Start retroy layout blog posts -->
    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @php
                    $originalString = htmlspecialchars_decode($berita->isi);
                    $maxCharacters = 25;
                    $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                @endphp
                <div class="col-md-9">
                    <h1 class="text-dark text-center">{{ ucfirst($berita->judul) }}</h1>
                    <a href="" class="h-entry mb-30 v-height gradient">
                        @php
                            if ($berita->img) {
                                echo "<div class='featured-img'
                        style='background-image: url(" .
                                    asset('assets/berita/images/' . $berita->img) .
                                    ")';>
                    </div>";
                            }
                        @endphp
                        {{-- <img src="{{ asset('assets/berita/images/' . $berita->img) }}" alt=""> --}}

                        <div class="text">
                            <span class="date">{{ date('M. d, Y', strtotime($berita->waktu_publikasi)) }}</span>
                        </div>
                    </a>
                    <div class="berita-isi-wrapper">
                        {!! $berita->isi !!}

                    </div>
                </div>
                <div class="col-md-3">
                    <h5 class="text-dark mt-3 ms-4">Berita Terbaru</h5>
                    @foreach ($berita_side as $row)
                        @php
                            $originalString = htmlspecialchars_decode($row->isi);
                            $maxCharacters = 25;
                            $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                        @endphp
                        <ul>
                            <a href="#" class="h-entry mb-30 v-height gradient">
                                @php
                                    if ($row->img) {
                                        echo "<div class='featured-img'
                            style='background-image: url(" .
                                            asset('assets/berita/images/' . $row->img) .
                                            ")';>
                        </div>";
                                    }
                                @endphp
                                {{-- <img src="{{ asset('assets/berita/images/' . $row->img) }}" alt=""> --}}

                                <div class="text">
                                    <span class="date">{{ date('M. d, Y', strtotime($row->waktu_publikasi)) }}</span>
                                    <h2 class="text-white">{{ ucfirst($row->judul) }}</h2>
                                    <span>
                                        @php
                                            echo $truncatedString;
                                        @endphp
                                    </span>
                                </div>

                            </a>
                        </ul>
                    @endforeach
                </div>

            </div>

        </div>
    </section>
    <!-- End retroy layout blog posts -->
@endsection
