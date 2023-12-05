<?php

namespace App\Charts;

use App\Models\Loker;
use Illuminate\Support\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LokerChart
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
            $records = Loker::whereDay('waktu_publikasi', $currentDate->day)->count();

            $data[$currentDate->locale('id')->isoformat('dddd')] = $records;
        }
        return $this->chart->barChart()
            ->setHeight(300)
            ->setWidth(600)
            ->addData('Total Loker', [$data['Senin'], $data['Selasa'], $data['Rabu'], $data['Kamis'], $data['Jumat'], $data['Sabtu'], $data['Minggu']])
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
            $records = Loker::whereDay('waktu_publikasi', $currentDate->day)->count();

            $data[$currentDate->locale('id')->isoformat('dddd')] = $records;
        }
        return $this->chart->barChart()
            ->setHeight(300)
            ->setWidth(300)
            ->addData('Total Loker', [$data['Senin'], $data['Selasa'], $data['Rabu'], $data['Kamis'], $data['Jumat'], $data['Sabtu'], $data['Minggu']])
            ->setXAxis(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
    }
}
