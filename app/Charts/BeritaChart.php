<?php

namespace App\Charts;

use App\Models\Berita;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BeritaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function buildPC(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Calculate the date and time of the beginning of the current week
        $startOfWeek = Carbon::now()->startOfWeek();

        // Retrieve records for each day of the week
        $data = [];
        for ($day = 0; $day <= 6; $day++) {
            $currentDate = $startOfWeek->copy()->addDays($day);

            // Use whereDay to filter records for a specific day of the week
            $records = Berita::whereDay('waktu_publikasi', $currentDate->day)->count();

            $data[$currentDate->locale('id')->isoformat('dddd')] = $records;
        }
        return $this->chart->barChart()
            ->setHeight(300)
            ->setWidth(600)
            ->addData('Total Berita', [$data['Senin'], $data['Selasa'], $data['Rabu'], $data['Kamis'], $data['Jumat'], $data['Sabtu'], $data['Minggu']])
            ->setXAxis(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
    }

    public function buildMobile(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Calculate the date and time of the beginning of the current week
        $startOfWeek = Carbon::now()->startOfWeek();

        // Retrieve records for each day of the week
        $data = [];
        for ($day = 0; $day <= 6; $day++) {
            $currentDate = $startOfWeek->copy()->addDays($day);

            // Use whereDay to filter records for a specific day of the week
            $records = Berita::whereDay('waktu_publikasi', $currentDate->day)->count();

            $data[$currentDate->locale('id')->isoformat('dddd')] = $records;
        }
        return $this->chart->barChart()
            ->setHeight(300)
            ->setWidth(300)
            ->addData('Total Berita', [$data['Senin'], $data['Selasa'], $data['Rabu'], $data['Kamis'], $data['Jumat'], $data['Sabtu'], $data['Minggu']])
            ->setXAxis(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
    }

    public function buildPenulisPC(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Calculate the date and time of the beginning of the current week
        $startOfWeek = Carbon::now()->startOfWeek();

        // Retrieve records for each day of the week
        $data = [];
        for ($day = 0; $day <= 6; $day++) {
            $currentDate = $startOfWeek->copy()->addDays($day);

            // Use whereDay to filter records for a specific day of the week
            $records = Berita::whereDay('waktu_publikasi', $currentDate->day)->where('id_user', Auth::user()->id)->count();

            $data[$currentDate->locale('id')->isoformat('dddd')] = $records;
        }
        return $this->chart->barChart()
            ->setHeight(300)
            ->setWidth(600)
            ->addData('Total Berita', [$data['Senin'], $data['Selasa'], $data['Rabu'], $data['Kamis'], $data['Jumat'], $data['Sabtu'], $data['Minggu']])
            ->setXAxis(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
    }

    public function buildPenulisMobile(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Calculate the date and time of the beginning of the current week
        $startOfWeek = Carbon::now()->startOfWeek();

        // Retrieve records for each day of the week
        $data = [];
        for ($day = 0; $day <= 6; $day++) {
            $currentDate = $startOfWeek->copy()->addDays($day);

            // Use whereDay to filter records for a specific day of the week
            $records = Berita::whereDay('waktu_publikasi', $currentDate->day)->where('id_user', Auth::user()->id)->count();

            $data[$currentDate->locale('id')->isoformat('dddd')] = $records;
        }
        return $this->chart->barChart()
            ->setHeight(300)
            ->setWidth(300)
            ->addData('Total Berita', [$data['Senin'], $data['Selasa'], $data['Rabu'], $data['Kamis'], $data['Jumat'], $data['Sabtu'], $data['Minggu']])
            ->setXAxis(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
    }

    public function buildPenulisPCDonut(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $oneWeekAgo = Carbon::now()->subDays(7);

        // Retrieve records for each day of the week
        $dataMenunggu = Berita::where('waktu_publikasi', '>=', $oneWeekAgo)->where('status', 'menunggu')->where('id_user', Auth::user()->id)->count();
        $dataDiterima = Berita::where('waktu_publikasi', '>=', $oneWeekAgo)->where('status', 'aktif')->where('id_user', Auth::user()->id)->count();
        $dataDitolak = Berita::where('waktu_publikasi', '>=', $oneWeekAgo)->where('status', 'tidak aktif')->where('id_user', Auth::user()->id)->count();
        return $this->chart->donutChart()
            ->addData([$dataMenunggu, $dataDiterima, $dataDitolak])
            ->setHeight(400)
            ->setWidth(400)
            ->setLabels(['Menunggu', 'Diterima', 'Ditolak']);
    }

    public function buildPenulisMobileDonut(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $oneWeekAgo = Carbon::now()->subDays(7);

        // Retrieve records for each day of the week
        $dataMenunggu = Berita::where('waktu_publikasi', '>=', $oneWeekAgo)->where('status', 'menunggu')->where('id_user', Auth::user()->id)->count();
        $dataDiterima = Berita::where('waktu_publikasi', '>=', $oneWeekAgo)->where('status', 'aktif')->where('id_user', Auth::user()->id)->count();
        $dataDitolak = Berita::where('waktu_publikasi', '>=', $oneWeekAgo)->where('status', 'tidak aktif')->where('id_user', Auth::user()->id)->count();
        return $this->chart->donutChart()
            ->addData([$dataMenunggu, $dataDiterima, $dataDitolak])
            ->setHeight(300)
            ->setWidth(300)
            ->setLabels(['Menunggu', 'Diterima', 'Ditolak']);
    }
}
