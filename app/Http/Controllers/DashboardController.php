<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Loker;
use App\Models\Berita;
use App\Models\Pengaduan;
use App\Charts\BeritaChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function readDataDashboardAdmin(Request $request, BeritaChart $beritaChart)
    {
        $berita = Berita::count();
        $beritaMenunggu = Berita::where('status', 'menunggu')->count();
        $beritaAktif = Berita::where('status', 'aktif')->count();
        $beritaTidakAktif = Berita::where('status', 'tidak aktif')->count();
        $pengaduan = Pengaduan::count();
        $loker = Loker::count();
        $user  = User::count();
        $chart = $beritaChart->build();
        return view('admins.index', compact('chart', 'berita', 'beritaMenunggu', 'beritaAktif', 'beritaTidakAktif', 'pengaduan', 'loker', 'user'));        
    }
}
