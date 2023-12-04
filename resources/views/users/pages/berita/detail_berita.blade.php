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
                    <div class="text-start mb-5">
                        <a href="{{ route('landing') }}" class="btn btn-warning">Back to Berita</a>
                    </div>
                    <h1 class="text-dark mb-5 text-center">{{ ucfirst($berita->judul) }}</h1>
                    @if ($berita->img)
                        <figure class="text-center mb-4">
                            <img src="{{ asset('assets/berita/images/' . $berita->img) }}" alt="Gambar" style="width: 50%">
                        </figure>
                    @endif
                    <div class="text-center">
                        <span>Ditulis oleh {{ $publisherName}}</span>
                    </div>
                    <div class="text-center mb-2">                        
                        <span class="date">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                    </div>
                    <div class="p-5 border-3 rounded-3 border-secondary shadow-lg" style="border-style: outset">
                        {!! $berita->isi !!}

                    </div>
                </div>
                <div class="col-md-3">
                    <h5 class="text-dark mt-3 ms-4">Berita Lainnya</h5>
                    @foreach ($berita_side as $row)
                        @php
                            $originalString = htmlspecialchars_decode($row->isi);
                            $maxCharacters = 25;
                            $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                        @endphp
                        <ul>
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
                                {{-- <img src="{{ asset('assets/berita/images/' . $row->img) }}" alt=""> --}}

                                <div class="text">
                                    <span class="date">{{ \Carbon\Carbon::parse($row->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
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
