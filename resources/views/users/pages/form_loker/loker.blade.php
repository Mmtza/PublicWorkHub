@extends('users.layout.template')

@section('title', 'Loker')

@section('content')
    <!-- Start retroy layout blog posts -->
    <section class="section bg-light">
        <div class="container-fluid px-lg-5">
            <div class="row align-items-stretch retro-layout">
                <div class="col-md-3 order-last order-md-first">
                    <h3 class="text-dark mt-3 ms-4"><b>Daftar Loker</b></h3>
                    <div class="overflow-auto border border-primary border-1 rounded-3" style="max-height: 755px">
                        <ul class="list-unstyled">
                            @if (!empty($loker_side))
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($loker_side as $lokerside)
                                    <li class="mb-2 p-2 border-bottom border-primary border-1 custom-card-hover">
                                        <a href="{{ route('guest.loker.slug', $lokerside->slug) }}"
                                            class="text-decoration-none">
                                            <div class="d-flex">
                                                @if (empty($lokerPublisherSide[$no]->foto))
                                                    <div class ="rounded-circle p-2 pe-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="70"
                                                            height="70" viewBox="0 0 24 24" fill="none"
                                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path
                                                                d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                                                            <circle cx="12" cy="10" r="3" />
                                                            <circle cx="12" cy="12" r="10" />
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="rounded-circle p-2 pe-4">
                                                        <img width="90px" height="90px"
                                                            src="{{ asset('assets/users/images/' . $lokerPublisherSide[$no]->foto) }}"
                                                            alt="">
                                                    </div>
                                                @endif
                                                <div class="w-16">
                                                    <h5 class="">{{ $lokerside->nama_loker }}</h5>
                                                    <span><i class="fa-solid fa-building"></i>
                                                        {{ $lokerPublisherSide[$no]->name }}</span><br>
                                                    <span><i class="fa-solid fa-location-dot"></i>
                                                        {{ $lokerside->alamat }}</span><br>
                                                    <span>{{ \Carbon\Carbon::parse($lokerside->waktu_publikasi)->locale('id')->isoFormat('DD-MMMM-YYYY') }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                            @else
                                <li class="text-center p-3">
                                    <div class="mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#DC3545"
                                            class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                            <path
                                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-dark">Tidak ada loker saat ini</h3>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 order-first order-md-last mt-lg-4">
                    <h2 class="text-dark mb-3"><b>{{ $loker->nama_loker }}</b></h2>
                    <div class="row">
                        <span class="d-flex gap-2"><i class="fa-solid fa-location-dot"></i>
                            <h6>{{ $loker->alamat }}</h6>
                        </span>
                        <span class="d-flex gap-2"><i class="fa-solid fa-building"></i>
                            <h6>{{ $lokerPublisher->name }}</h6>
                        </span>
                    </div>
                    <hr>
                    <div class="d-flex mb-3 gap-4">
                        @if ($user_apply_loker == null)
                            <form action="{{ route('guest.loker.apply', $loker->slug) }}" method="POST" id="daftarLoker">
                                @csrf
                                @method('post')
                                <button class="btn btn-outline-success rounded">Daftar</button>
                            </form>
                            <script>
                                document.getElementById("daftarLoker").addEventListener('submit', function(e) {
                                    e.preventDefault();

                                    Swal.fire({
                                        title: 'Apakah kamu yakin?',
                                        text: 'Ingin mendaftar di lowongan pekerjaan ini',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, Daftar'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // If confirmed, submit the form
                                            this.submit();
                                        }
                                    });
                                });
                            </script>
                        @else
                            <form action="{{ route('guest.loker.cancel', $loker->slug) }}" method="POST" id="cancelLoker">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger rounded">Cancel</button>
                            </form>
                            <script>
                                document.getElementById("cancelLoker").addEventListener('submit', function(e) {
                                    e.preventDefault();

                                    Swal.fire({
                                        title: 'Apakah kamu yakin?',
                                        text: 'Ingin membatalkan pendaftaran di lowongan pekerjaan ini',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, Batalkan'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // If confirmed, submit the form
                                            this.submit();
                                        }
                                    });
                                });
                            </script>
                        @endif
                        <a class="btn btn-outline-primary rounded" href="{{ route('user', $lokerPublisher->id) }}">Hubungi</a>
                    </div>
                    <div class="berita-isi-wrapper">
                        {!! $loker->deskripsi_loker !!}
                    </div>
                </div>
                <div class="col-md-3 order-md-last order-md-first">
                    <h3 class="text-dark mt-3 ms-4"><b>Histori Lamaran</b></h3>
                    <div class="overflow-auto border border-primary border-1 rounded-3" style="max-height: 755px">
                        <ul class="list-unstyled">
                            @if (!empty($loker_applier))
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($loker_applier as $lokerapply)
                                    <li class="mb-2 p-2 border-bottom border-primary border-1 custom-card-hover">
                                        <a href="{{ route('guest.loker.slug', $lokerapply->slug) }}" class="text-decoration-none">
                                            <div class="d-flex">
                                                @if (empty($user_loker[$no]->foto))
                                                    <div class ="rounded-circle p-2 pe-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="70"
                                                            height="70" viewBox="0 0 24 24" fill="none"
                                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path
                                                                d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                                                            <circle cx="12" cy="10" r="3" />
                                                            <circle cx="12" cy="12" r="10" />
                                                        </svg>
                                                    </div>
                                                @else
                                                    <div class="rounded-circle p-2 pe-4">
                                                        <img width="90px" height="90px"
                                                            src="{{ asset('assets/users/images/' . $user_loker[$no]->foto) }}"
                                                            alt="">
                                                    </div>
                                                @endif
                                                <div class="w-16">
                                                    <h5 class="">{{ $lokerapply->nama_loker }}</h5>
                                                    <span><i class="fa-solid fa-building"></i>
                                                        {{ $user_loker[$no]->name }}</span><br>
                                                    <span><i class="fa-solid fa-location-dot"></i>
                                                        {{ $lokerapply->nama_loker }}</span><br>
                                                    <span>{{ \Carbon\Carbon::parse($lokerapply->waktu_apply)->locale('id')->isoFormat('DD-MMMM-YYYY') }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                            @else
                                <li class="text-center p-3">
                                    <div class="mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#DC3545"
                                            class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                            <path
                                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-dark">Kamu belum melamar lowongan pekerjaan</h4>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End retroy layout blog posts -->
@endSection
