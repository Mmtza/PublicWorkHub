@extends('penulis/layout/template')

@section('title', 'Dashboard')

@section('content')
<main class="main" id="top">
    <div class="content">
        <div class="pb-5">
          <div class="row g-4">
            <div class="col-12 col-xxl-6">
              <div class="mb-8">
                <h2 class="mb-2">Dashboard</h2>
                <h5 class="text-700 fw-semi-bold">Here’s what’s going on at publick work hub right now</h5>
              </div>
              <div class="row align-items-center g-4">
                <div class="col-12 col-md-auto">
                  <div class="d-flex align-items-center">
                    <span class="fa-stack" style="min-height: 46px; min-width: 46px"
                      ><span class="fa-solid fa-square fa-stack-2x text-success-300" data-fa-transform="down-4 rotate--10 left-4"></span
                      ><span class="fa-solid fa-circle fa-stack-2x stack-circle text-success-100" data-fa-transform="up-4 right-3 grow-2"></span><span class="fa-stack-1x fa-solid fa-star text-success" data-fa-transform="shrink-2 up-8 right-6"></span
                    ></span>
                    <div class="ms-3">
                      <h4 class="mb-0">57 berita</h4>
                      <p class="text-800 fs--1 mb-0">Total Berita</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-auto">
                  <div class="d-flex align-items-center">
                    <span class="fa-stack" style="min-height: 46px; min-width: 46px"
                      ><span class="fa-solid fa-square fa-stack-2x text-warning-300" data-fa-transform="down-4 rotate--10 left-4"></span
                      ><span class="fa-solid fa-circle fa-stack-2x stack-circle text-warning-100" data-fa-transform="up-4 right-3 grow-2"></span><span class="fa-stack-1x fa-solid fa-pause text-warning" data-fa-transform="shrink-2 up-8 right-6"></span
                    ></span>
                    <div class="ms-3">
                      <h4 class="mb-0">5 Berita</h4>
                      <p class="text-800 fs--1 mb-0">Berita Aktif</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-auto">
                  <div class="d-flex align-items-center">
                    <span class="fa-stack" style="min-height: 46px; min-width: 46px"
                      ><span class="fa-solid fa-square fa-stack-2x text-danger-300" data-fa-transform="down-4 rotate--10 left-4"></span
                      ><span class="fa-solid fa-circle fa-stack-2x stack-circle text-danger-100" data-fa-transform="up-4 right-3 grow-2"></span><span class="fa-stack-1x fa-solid fa-xmark text-danger" data-fa-transform="shrink-2 up-8 right-6"></span
                    ></span>
                    <div class="ms-3">
                      <h4 class="mb-0">15 Berita</h4>
                      <p class="text-800 fs--1 mb-0">Berita Tidak Aktif</p>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="bg-200 mb-6 mt-4" />
            </div>
            <div class="col-12 col-xxl-6">
              <div class="row g-3">
                <div class="col-12 col-md-6">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div>
                          <h5 class="mb-1">
                            Total Berita<span class="badge badge-phoenix badge-phoenix-warning rounded-pill fs--1 ms-2"><span class="badge-label">-6.8%</span></span>
                          </h5>
                          <h6 class="text-700">Last 7 days</h6>
                        </div>
                        <h4>20</h4>
                      </div>
                      <div class="d-flex justify-content-center px-4 py-6">
                        <div class="echart-total-orders" style="height: 85px; width: 115px"></div>
                      </div>
                      <div class="mt-2">
                        <div class="d-flex align-items-center mb-2">
                          <div class="bullet-item bg-primary me-2"></div>
                          <h6 class="text-900 fw-semi-bold flex-1 mb-0">Aktif</h6>
                          <h6 class="text-900 fw-semi-bold mb-0">50%</h6>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="bullet-item bg-primary-100 me-2"></div>
                          <h6 class="text-900 fw-semi-bold flex-1 mb-0">Tidak Aktif</h6>
                          <h6 class="text-900 fw-semi-bold mb-0">50%</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div>
                          <h5 class="mb-1">
                            Total Views<span class="badge badge-phoenix badge-phoenix-warning rounded-pill fs--1 ms-2"> <span class="badge-label">+26.5%</span></span>
                          </h5>
                          <h6 class="text-700">Last 7 days</h6>
                        </div>
                        <h4>1227</h4>
                      </div>
                      <div class="pb-0 pt-4">
                        <div class="echarts-new-customers" style="height: 180px; width: 100%"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</main>
@endSection
