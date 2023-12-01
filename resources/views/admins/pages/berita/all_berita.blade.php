@extends('admins.layout.template')

@section('title', 'PWH | Management Berita')

@section('content')

    <h1 class="fs-1 mb-5">Management Berita</h1>
    <div class="d-flex mb-3">
        <a href={{ route('admin.berita.tambah') }} class="btn btn-primary ms-auto">Tambah</a>
    </div>
    @if ($beritaCount == 0)
        <div class="alert alert-warning text-light d-flex flex-col align-items-center gap-2" role="alert">
            <span>
                <i class="fa fa-info-circle" aria-hidden="true"></i>
            </span>
            <span>
                Tidak ada berita saat ini
            </span>
        </div>
    @else
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
                        <div class="d-flex justify-content-end ">
                            <p class="border border-warning rounded d-inline-block p-1 justify-content-end">
                                {{ $b->status }} </p>
                        </div>
                        <h5 class="card-title">{{ $b->judul }}</h5>
                        <div class="card-text">
                            @php
                                echo $truncatedString;
                            @endphp
                        </div>
                        <a href="{{ route('admin.berita.edit', $b->slug) }}" class="btn btn-warning">
                            <div class="d-flex align-items-center gap-2">
                                <span class="fas fa-pencil"></span>
                                <span>Edit</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
