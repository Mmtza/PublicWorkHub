<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Loker;
use App\Models\Berita;
use App\Charts\UserChart;
use App\Models\Pengaduan;
use App\Charts\LokerChart;
use App\Charts\BeritaChart;
use Illuminate\Http\Request;
use App\Charts\PengaduanChart;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function readDataDashboardAdmin(
        Request $request, BeritaChart $beritaChart, PengaduanChart $pengaduanChart, 
        LokerChart $lokerChart, UserChart $userChart
    )
    {
        $notification = Notification::where('id_has_user', Auth::user()->id)->orderBy('id', 'desc')->with('getUser')->get();
        $berita = Berita::count();
        $beritaMenunggu = Berita::where('status', 'menunggu')->count();
        $beritaAktif = Berita::where('status', 'aktif')->count();
        $beritaTidakAktif = Berita::where('status', 'tidak aktif')->count();
        $percentageBeritaMenunggu = 0;
        $percentageBeritaAktif = 0;
        $percentageBeritaTidakAktif = 0;
        if ($beritaMenunggu > 0)
            $percentageBeritaMenunggu = number_format((($beritaMenunggu / $berita) * 100), 2);

        if($beritaAktif > 0)
            $percentageBeritaAktif = number_format((($beritaAktif / $berita) * 100), 2);

        if($beritaTidakAktif > 0)
            $percentageBeritaTidakAktif = number_format((($beritaTidakAktif / $berita) * 100), 2);

        $pengaduan = Pengaduan::count();
        $pengaduanMenunggu = Pengaduan::where('status', 'menunggu')->count();
        $pengaduanDiterima = Pengaduan::where('status', 'diterima')->count();
        $pengaduanDitolak = Pengaduan::where('status', 'ditolak')->count();
        $percentagePengaduanMenunggu = 0;
        $percentagePengaduanDiterima = 0;
        $percentagePengaduanDitolak = 0;

        if ($pengaduanMenunggu > 0)
            $percentagePengaduanMenunggu = number_format((($pengaduanMenunggu / $pengaduan) * 100), 2);

        if ($pengaduanDiterima > 0)
            $percentagePengaduanDiterima = number_format((($pengaduanDiterima / $pengaduan) * 100), 2);

        if ($pengaduanDitolak > 0)
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
            'loker', 'user', 'notification'));        
    }

    public function readDataPenulisDashboard(Request $request, BeritaChart $beritaChart)
    {
        $notification = Notification::where('id_has_user', Auth::user()->id)->orderBy('id', 'desc')->with('getUser')->get();
        $berita = Berita::where('id_user', Auth::user()->id)->count();
        $beritaMenunggu = Berita::where('status', 'menunggu')->where('id_user', Auth::user()->id)->count();
        $beritaAktif = Berita::where('status', 'aktif')->where('id_user', Auth::user()->id)->count();
        $beritaTidakAktif = Berita::where('status', 'tidak aktif')->where('id_user', Auth::user()->id)->count();
        $percentageBeritaMenunggu = 0;
        $percentageBeritaAktif = 0;
        $percentageBeritaTidakAktif = 0;
        
        if ($beritaMenunggu > 0)
            $percentageBeritaMenunggu = number_format((($beritaMenunggu / $berita) * 100), 2);

        if($beritaAktif > 0)
            $percentageBeritaAktif = number_format((($beritaAktif / $berita) * 100), 2);

        if($beritaTidakAktif > 0)
            $percentageBeritaTidakAktif = number_format((($beritaTidakAktif / $berita) * 100), 2);

        $chartBerita = $beritaChart->buildPenulisPC();
        $chartBeritaMobile = $beritaChart->buildPenulisMobile();
        $chartStatus = $beritaChart->buildPenulisPCDonut();
        $chartStatusMobile = $beritaChart->buildPenulisMobileDonut();
        return view('penulis.index', compact(
            'chartBerita', 'chartBeritaMobile', 'chartStatus', 'chartStatusMobile', 'berita', 
            'percentageBeritaMenunggu', 'percentageBeritaAktif', 'percentageBeritaTidakAktif',
            'notification'
        ));        
    }

    public function readDataPenyediaLokerDashboard(Request $request, LokerChart $lokerChart)
    {
        $loker = Loker::where('id_user', Auth::user()->id)->count();
        $chartLoker = $lokerChart->buildPenyediaLokerPC();
        $chartLokerMobile = $lokerChart->buildPenyediaLokerMobile();
        $notification = Notification::where('id_has_user', Auth::user()->id)->orderBy('id', 'desc')->with('getUser')->get();
        return view('penyedia_loker.index', compact('loker', 'chartLoker', 'chartLokerMobile', 'notification'));
    }
}
