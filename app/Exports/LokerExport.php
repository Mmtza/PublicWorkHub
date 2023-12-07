<?php

namespace App\Exports;

use App\Models\Loker;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class LokerExport implements FromCollection, WithHeadings {
    /**
     * @return \Illuminate\Support\Collection
     */
    public $start_date;
    public $end_date;
    public $all;

    public function __construct($start_date, $end_date, $all) {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->all = $all;
    }
    public function collection() {
        if($this->all == true) {
            return Loker::select('nama_loker', 'deskripsi_loker', 'alamat', 'slug', 'waktu_publikasi')->get();
        } else {
            return Loker::select('nama_loker', 'deskripsi_loker', 'alamat', 'slug', 'waktu_publikasi')->whereBetween('waktu_publikasi', [$this->start_date, $this->end_date])->get();
        }
    }

    public function headings(): array {
        return [
            'nama_loker', 
            'deskripsi_loker', 
            'alamat', 
            'slug', 
            'waktu_publikasi'
        ];
    }

}
