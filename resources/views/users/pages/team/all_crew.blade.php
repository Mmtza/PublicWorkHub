@extends('users.layout.template')

@section('title', 'Home')

@section('content')
    <!-- Start retroy layout blog posts -->
    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                <h1 class="text-dark text-center">Our Team</h1>
                <hr>
                <div class="col-12 d-flex offset-1 gap-5 mt-3">
                    @foreach ($team as $row)
                        <div class="card rounded-2 custom-card-hover shadow-lg" style="width: 18rem;">
                            <img src="{{ asset('assets/team/images/' . $row->nama_anggota . '.jpg') }}" class='card-img-top'
                                style="height: 80%">
                            <p class="border border-success rounded d-inline-block p-1 justify-content-end position-absolute end-0 m-2 bg-white text-dark"
                                style="font-family: 'Courier New', Courier, monospace">
                                {{ ucfirst($row->role) }} </p>
                            <div class="card-body">

                                <div class="d-flex justify-content-end ">
                                </div>
                                <h5 class="card-title">

                                </h5>
                                <div class="card-text text-center">
                                    <h6 class="text-dark" style="font-weight: 600">{{ $row->nama_anggota }}</h6>
                                    <span>{{ $row->nim }} - {{ $row->program_studi }}</span>
                                    <span>{{ $row->asal_kampus }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>
    <!-- End retroy layout blog posts -->
@endsection
