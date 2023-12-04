@extends('admins.layout.template')

@section('title', 'PWH | Management Berita')

@section('content')
    <section class="section bg-light" style="min-height: 80vh">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-end mb-5">
                        <a href="{{ route('admin.berita') }}" class="btn btn-warning">Back to Berita</a>
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
                    <div class="text-center mb-2 ">                        
                        <span class="date">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}                        </span>
                    </div>
                    <div class="p-5 border-3 rounded-3 border-secondary shadow-lg" style="border-style: outset">
                        {!! $berita->isi !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End retroy layout blog posts -->
@endsection
