<?php

namespace App\Models;

use App\Models\Berita_Has_Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "kategori";

    protected $fillable = [
        'nama_kategori',
        'type',
        'keterangan',
    ];

    public $timestamps = false;

    public function getBeritaHasKategori() {
        return $this->belongsToMany(Berita_Has_Kategori::class);
    }

    public function getLokerHasKategori() {
        return $this->belongsToMany(Loker_Has_Kategori::class);
    }
}
