@extends('penulis.layout.template')

@section('title', 'PWH | Dashboard')

@section('content')
<main class="main" id="top">
    <div class="content pt-0">
        <div class="pb-5">
          <div class="row g-4">
            <div class="col-12 col-xxl-6">
              <div class="mb-8">
                <h2 class="mb-2">Dashboard</h2>
                <h5 class="text-700 fw-semi-bold">Here’s what’s going on at public work hub right now</h5>
              </div>
            </div>
          </div>
          <div class="row g-4">
            <div class="col">
              <div class="card h-100">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="mb-1">Total Berita</h5>
                      <h6 class="text-700">Last 7 days</h6>
                    </div>
                    <h4>{{ $berita }}</h4>
                  </div>
                  <div class="d-none d-lg-flex justify-content-center px-4 py-6">
                    <div>
                      {!! $chartBerita->container() !!}                  
                    </div>
                  </div>
                  <div class="d-lg-none d-flex justify-content-center px-4 py-6">
                    <div>
                      {!! $chartBeritaMobile->container() !!}                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="mb-1">Status Berita</h5>
                      <h6 class="text-700">Last 7 days</h6>
                    </div>
                  </div>
                  <div class="d-none d-lg-flex justify-content-center px-4 py-6">
                    <div>
                      {!! $chartStatus->container() !!}                  
                    </div>
                  </div>
                  <div class="d-lg-none d-flex justify-content-center px-4 py-6">
                    <div>
                      {!! $chartStatusMobile->container() !!}                  
                    </div>
                  </div>
                  <div class="mt-2">
                    <div class="d-flex align-items-center mb-2">
                      <div class="bullet-item bg-info me-2"></div>
                      <h6 class="text-900 fw-semi-bold flex-1 mb-0">Menunggu</h6>
                      <h6 class="text-900 fw-semi-bold mb-0">{{ $percentageBeritaMenunggu }}%</h6>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                      <div class="bullet-item bg-success me-2"></div>
                      <h6 class="text-900 fw-semi-bold flex-1 mb-0">Aktif</h6>
                      <h6 class="text-900 fw-semi-bold mb-0">{{ $percentageBeritaAktif }}%</h6>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="bullet-item bg-warning me-2"></div>
                      <h6 class="text-900 fw-semi-bold flex-1 mb-0">Tidak Aktif</h6>
                      <h6 class="text-900 fw-semi-bold mb-0">{{ $percentageBeritaTidakAktif }}%</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="{{ $chartBerita->cdn() }}"></script>
    <script src="{{ $chartBeritaMobile->cdn() }}"></script>
    <script src="{{ $chartStatus->cdn() }}"></script>
    <script src="{{ $chartStatusMobile->cdn() }}"></script>
    {{ $chartBerita->script() }}
    {{ $chartBeritaMobile->script() }}
    {{ $chartStatus->script() }}
    {{ $chartStatusMobile->script() }}
  </main>
@endSection
