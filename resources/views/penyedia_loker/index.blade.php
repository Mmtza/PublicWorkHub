@extends('penyedia_loker.layout.template')

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
                      <h5 class="mb-1">Total Loker</h5>
                      <h6 class="text-700">Last 7 days</h6>
                    </div>
                    <h4>{{ $loker }}</h4>
                  </div>
                  <div class="d-none d-lg-flex justify-content-center px-4 py-6">
                    <div>
                      {!! $chartLoker->container() !!}                  
                    </div>
                  </div>
                  <div class="d-lg-none d-flex justify-content-center px-4 py-6">
                    <div>
                      {!! $chartLokerMobile->container() !!}                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="{{ $chartLoker->cdn() }}"></script>
    <script src="{{ $chartLokerMobile->cdn() }}"></script>
    {{ $chartLoker->script() }}
    {{ $chartLokerMobile->script() }}
  </main>
@endSection
