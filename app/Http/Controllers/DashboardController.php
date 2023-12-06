<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Loker;
use App\Models\Berita;
use App\Models\Pengaduan;
use App\Charts\BeritaChart;
use App\Charts\LokerChart;
use App\Charts\PengaduanChart;
use App\Charts\UserChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function readDataDashboardAdmin(
        Request $request, BeritaChart $beritaChart, PengaduanChart $pengaduanChart, 
        LokerChart $lokerChart, UserChart $userChart
    )
    {
        $berita = Berita::count();
        $beritaMenunggu = Berita::where('status', 'menunggu')->count();
        $beritaAktif = Berita::where('status', 'aktif')->count();
        $beritaTidakAktif = Berita::where('status', 'tidak aktif')->count();
        $percentageBeritaMenunggu = number_format((($beritaMenunggu / $berita) * 100), 2);
        $percentageBeritaAktif = number_format((($beritaAktif / $berita) * 100), 2);
        $percentageBeritaTidakAktif = number_format((($beritaTidakAktif / $berita) * 100), 2);
        $pengaduan = Pengaduan::count();
        $pengaduanMenunggu = Pengaduan::where('status', 'menunggu')->count();
        $pengaduanDiterima = Pengaduan::where('status', 'diterima')->count();
        $pengaduanDitolak = Pengaduan::where('status', 'ditolak')->count();
        $percentagePengaduanMenunggu = number_format((($pengaduanMenunggu / $pengaduan) * 100), 2);
        $percentagePengaduanDiterima = number_format((($pengaduanDiterima / $pengaduan) * 100), 2);
        $percentagePengaduanDitolak = number_format((($pengaduanDitolak / $pengaduan) * 100), 2);
        $loker = Loker::count();
        $user  = User::count();
        $chartBerita = $beritaChart->buildPC();
        $chartBeritaMobile = $beritaChart->buildMobile();
        $chartPengaduan = $pengaduanChart->buildPC();
        $chartPengaduanMobile = $pengaduanChart->buildMobile();
        $chartLoker = $lokerChart->buildPC();
        $chartLokerMobile = $lokerChart->buildMobile();
        $chartUser = $userChart->buildPC();
        $chartUserMobile = $userChart->buildMobile();
        return view('admins.index', compact(
            'chartBerita', 'chartBeritaMobile', 'chartPengaduan', 
            'chartPengaduanMobile', 'chartLoker', 'chartLokerMobile', 'chartUser', 'chartUserMobile',
            'berita', 'percentageBeritaMenunggu', 'percentageBeritaAktif', 'percentageBeritaTidakAktif', 
            'pengaduan', 'percentagePengaduanMenunggu', 'percentagePengaduanDiterima', 'percentagePengaduanDitolak', 
            'loker', 
            'user'));        
    }
}
