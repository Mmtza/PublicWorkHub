<?php

namespace App\Charts;

use App\Models\Pengaduan;
use Illuminate\Support\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PengaduanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function buildPC(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $oneWeekAgo = Carbon::now()->subDays(7);

        // Retrieve records for each day of the week
        $dataMenunggu = Pengaduan::where('waktu_pengaduan', '>=', $oneWeekAgo)->where('status', 'menunggu')->count();
        $dataDiterima = Pengaduan::where('waktu_pengaduan', '>=', $oneWeekAgo)->where('status', 'diterima')->count();
        $dataDitolak = Pengaduan::where('waktu_pengaduan', '>=', $oneWeekAgo)->where('status', 'ditolak')->count();
        return $this->chart->donutChart()
            ->addData([$dataMenunggu, $dataDiterima, $dataDitolak])
            ->setHeight(400)
            ->setWidth(400)
            ->setLabels(['Menunggu', 'Diterima', 'Ditolak']);
    }

    public function buildMobile(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $oneWeekAgo = Carbon::now()->subDays(7);

        // Retrieve records for each day of the week
        $dataMenunggu = Pengaduan::where('waktu_pengaduan', '>=', $oneWeekAgo)->where('status', 'menunggu')->count();
        $dataDiterima = Pengaduan::where('waktu_pengaduan', '>=', $oneWeekAgo)->where('status', 'diterima')->count();
        $dataDitolak = Pengaduan::where('waktu_pengaduan', '>=', $oneWeekAgo)->where('status', 'ditolak')->count();
        return $this->chart->donutChart()
            ->addData([$dataMenunggu, $dataDiterima, $dataDitolak])
            ->setHeight(300)
            ->setWidth(300)
            ->setLabels(['Menunggu', 'Diterima', 'Ditolak']);
    }
}
