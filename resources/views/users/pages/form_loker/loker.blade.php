@extends('users.layout.template')

@section('title', 'Loker')

@section('content')
    <!-- Start retroy layout blog posts -->
    <section class="section bg-light">
        <div class="container-fluid">
            <div class="row align-items-stretch retro-layout">
                <div class="col-md-3 order-last order-lg-first">
                    <h3 class="text-dark mt-3 ms-4"><b>Daftar Loker</b></h3>
                    <div class="overflow-auto border border-primary border-1 rounded-3" style="max-height: 755px">
                        <ul class="list-unstyled">
                            @php
                                $no = 0;   
                            @endphp
                            @foreach ($loker_side as $lokerside)                                
                                <li class="mb-2 p-2 border-bottom border-primary border-1 custom-card-hover">
                                    <a href="" class="text-decoration-none">
                                        <div class="d-flex">
                                            <img width="90px" height="90px" src="{{ asset('assets/users') }}/images/pwhlogo3.png" alt="">
                                            <div class="w-16">
                                                <h5 class="">{{ $lokerside->nama_loker }}</h5>
                                                <span><i class="fa-solid fa-building"></i> {{ $lokerPublisherSide[$no] }}</span><br>
                                                <span ><i class="fa-solid fa-location-dot"></i> {{ $lokerside->alamat }}</span><br>
                                                <span>{{ \Carbon\Carbon::parse($lokerside->waktu_publikasi)->locale('id')->isoFormat('DD-MMMM-YYYY') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 order-first order-lg-last mt-lg-4">
                    <h2 class="text-dark mb-3"><b>{{ $loker->nama_loker }}</b></h2>
                    <div class="row">
                        <span class="d-flex gap-2"><i class="fa-solid fa-location-dot"></i><h6>{{ $loker->alamat }}</h6></span>
                        <span class="d-flex gap-2"><i class="fa-solid fa-building"></i><h6>{{ $lokerPublisher }}</h6></span>
                    </div>
                    <hr>
                    <div class="d-flex mb-3 gap-4">
                        <a href="" class="btn btn-outline-success rounded">Daftar</a>
                        <a href="" class="btn btn-outline-danger rounded">Cancel</a>
                        <a href="" class="btn btn-outline-primary rounded">Hubungi</a>
                    </div>
                    <div class="berita-isi-wrapper">
                        {{ $loker->deskripsi_loker }}
                    </div>
                </div>
                <div class="col-md-3 order-lg-last order-lg-first">
                    <h3 class="text-dark mt-3 ms-4"><b>Histori Lamaran</b></h3>
                    <div class="overflow-auto border border-primary border-1 rounded-3" style="max-height: 755px">
                        <ul class="list-unstyled">
                            <li class="mb-2 p-2 border-bottom border-primary border-1 custom-card-hover">
                                <a href="" class="text-decoration-none">
                                    <div class="d-flex">
                                        <img width="90px" height="90px" src="{{ asset('users/themes') }}/images/pwhlogo3.png" alt="">
                                        <div class="w-16">
                                            <h5 class="">Frontend Web Development</h5>
                                            <span><i class="fa-solid fa-building"></i> Pt . Public Work Hub</span><br>
                                            <span ><i class="fa-solid fa-location-dot"></i> Jl.Jendral Ahmad Yani</span><br>
                                            <span>11-12-2023</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2 p-2 border-bottom border-primary border-1 custom-card-hover">
                                <a href="" class="text-decoration-none">
                                    <div class="d-flex">
                                        <img width="90px" height="90px" src="{{ asset('users/themes') }}/images/pwhlogo3.png" alt="">
                                        <div class="w-16">
                                            <h5 class="">Frontend Web Development</h5>
                                            <span><i class="fa-solid fa-building"></i> Pt . Public Work Hub</span><br>
                                            <span ><i class="fa-solid fa-location-dot"></i> Jl.Jendral Ahmad Yani</span><br>
                                            <span>11-12-2023</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2 p-2 border-bottom border-primary border-1 custom-card-hover">
                                <a href="" class="text-decoration-none">
                                    <div class="d-flex">
                                        <img width="90px" height="90px" src="{{ asset('users/themes') }}/images/pwhlogo3.png" alt="">
                                        <div class="w-16">
                                            <h5 class="">Frontend Web Development</h5>
                                            <span><i class="fa-solid fa-building"></i> Pt . Public Work Hub</span><br>
                                            <span ><i class="fa-solid fa-location-dot"></i> Jl.Jendral Ahmad Yani</span><br>
                                            <span>11-12-2023</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2 p-2 border-bottom border-primary border-1 custom-card-hover">
                                <a href="" class="text-decoration-none">
                                    <div class="d-flex">
                                        <img width="90px" height="90px" src="{{ asset('users/themes') }}/images/pwhlogo3.png" alt="">
                                        <div class="w-16">
                                            <h5 class="">Frontend Web Development</h5>
                                            <span><i class="fa-solid fa-building"></i> Pt . Public Work Hub</span><br>
                                            <span ><i class="fa-solid fa-location-dot"></i> Jl.Jendral Ahmad Yani</span><br>
                                            <span>11-12-2023</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2 p-2 border-bottom border-primary border-1 custom-card-hover">
                                <a href="" class="text-decoration-none">
                                    <div class="d-flex">
                                        <img width="90px" height="90px" src="{{ asset('users/themes') }}/images/pwhlogo3.png" alt="">
                                        <div class="w-16">
                                            <h5 class="">Frontend Web Development</h5>
                                            <span><i class="fa-solid fa-building"></i> Pt . Public Work Hub</span><br>
                                            <span ><i class="fa-solid fa-location-dot"></i> Jl.Jendral Ahmad Yani</span><br>
                                            <span>11-12-2023</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2 p-2 border-bottom border-primary border-1 custom-card-hover">
                                <a href="" class="text-decoration-none">
                                    <div class="d-flex">
                                        <img width="90px" height="90px" src="{{ asset('users/themes') }}/images/pwhlogo3.png" alt="">
                                        <div class="w-16">
                                            <h5 class="">Frontend Web Development</h5>
                                            <span><i class="fa-solid fa-building"></i> Pt . Public Work Hub</span><br>
                                            <span ><i class="fa-solid fa-location-dot"></i> Jl.Jendral Ahmad Yani</span><br>
                                            <span>11-12-2023</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2 p-2 border-bottom border-primary border-1 custom-card-hover">
                                <a href="" class="text-decoration-none">
                                    <div class="d-flex">
                                        <img width="90px" height="90px" src="{{ asset('users/themes') }}/images/pwhlogo3.png" alt="">
                                        <div class="w-16">
                                            <h5 class="">Frontend Web Development</h5>
                                            <span><i class="fa-solid fa-building"></i> Pt . Public Work Hub</span><br>
                                            <span ><i class="fa-solid fa-location-dot"></i> Jl.Jendral Ahmad Yani</span><br>
                                            <span>11-12-2023</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End retroy layout blog posts -->
@endSection