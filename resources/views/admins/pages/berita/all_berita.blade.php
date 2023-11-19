@extends('admins.layout.template')

@section('title', 'Management Berita')

@section('content')

    <h1 class="fs-1 mb-5">Management Berita</h1>
    <div class="d-flex mb-3">
        <a href={{ route('admin.berita.tambah') }} class="btn btn-primary ms-auto">Tambah</a>
    </div>
    <div class="d-flex flex-column flex-lg-row flex-wrap gap-3">
        @foreach ($berita as $b)
            @php
                $originalString = htmlspecialchars_decode($b->isi);
                $maxCharacters = 100;
                $truncatedString = Str::limit($originalString, $maxCharacters, '...');
            @endphp

            <div class="card" style="width: 18rem;">
                @php
                    if ($b->img) {
                        echo "                    
                    <img src=" .
                            asset('assets/berita/images/' . $b->img) .
                            " class='card-img-top'>
                    ";
                    }
                @endphp
                <div class="card-body">
                    <h5 class="card-title">{{ $b->judul }}</h5>
                    <div class="card-text">
                        @php
                            echo $truncatedString;
                        @endphp
                    </div>
                    <a href="{{ route('admin.berita.edit', $b->id) }}" class="btn btn-warning">
                        <div class="d-flex align-items-center gap-2">
                            <span class="fas fa-pencil"></span>
                            <span>Edit</span>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
