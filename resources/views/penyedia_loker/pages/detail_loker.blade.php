@extends('penyedia_loker.layout.template')

@section('title', 'PWH | Management Loker')

@section('content')
    <section class="section bg-light" style="min-height: 80vh">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-end mb-5">
                        <a href="{{ route('penyedia-loker.loker') }}" class="btn btn-warning">Back to Loker</a>
                    </div>
                    <div>
                        <h2 class="text-dark mb-3 text-center"><b>{{ $loker->nama_loker }}</b></h2>
                        <div class="row g-2">
                            <span class="d-flex gap-2 justify-content-center align-items-center"><i class="fa-solid fa-location-dot"></i>
                                <h6>{{ $loker->alamat }}</h6>
                            </span>
                            <span class="d-flex gap-2 justify-content-center align-items-center"><i class="fa-solid fa-building"></i>
                                <h6>{{ $publisherData->name }}</h6>
                            </span>
                        </div>
                        <hr>
                        <div class="p-5 border-3 rounded-3 border-secondary shadow-lg">
                            {!! $loker->deskripsi_loker !!}
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </section>
    <!-- End retroy layout blog posts -->
@endsection
