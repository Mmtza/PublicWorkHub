<?php

namespace App\Charts;

use App\Models\User;
use Illuminate\Support\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class UserChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function buildPC(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $startOfWeek = Carbon::now()->startOfWeek();

        // Retrieve records for each day of the week
        $data = [];
        for ($day = 0; $day <= 6; $day++) {
            $currentDate = $startOfWeek->copy()->addDays($day);

            // Use whereDay to filter records for a specific day of the week
            $records = User::whereDay('created_at', $currentDate->day)->count();

            $data[$currentDate->locale('id')->isoformat('dddd')] = $records;
        }
        return $this->chart->lineChart()
            ->addData('Total User', [$data['Senin'], $data['Selasa'], $data['Rabu'], $data['Kamis'], $data['Jumat'], $data['Sabtu'], $data['Minggu']])
            ->setHeight(300)
            ->setWidth(600)
            ->setXAxis(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
    }

    public function buildMobile(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $startOfWeek = Carbon::now()->startOfWeek();

        // Retrieve records for each day of the week
        $data = [];
        for ($day = 0; $day <= 6; $day++) {
            $currentDate = $startOfWeek->copy()->addDays($day);

            // Use whereDay to filter records for a specific day of the week
            $records = User::whereDay('created_at', $currentDate->day)->count();

            $data[$currentDate->locale('id')->isoformat('dddd')] = $records;
        }
        return $this->chart->lineChart()
            ->addData('Total User', [$data['Senin'], $data['Selasa'], $data['Rabu'], $data['Kamis'], $data['Jumat'], $data['Sabtu'], $data['Minggu']])
            ->setHeight(250)
            ->setWidth(250)
            ->setXAxis(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
    }
}
