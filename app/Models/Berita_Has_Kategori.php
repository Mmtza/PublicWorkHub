<?php

namespace App\Models;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita_Has_Kategori extends Model
{
    use HasFactory;

    protected $table = 'berita_has_kategori';

    public function getBerita() {
        return $this->hasMany(Berita::class);
    }

    public function getKategori() {
        return $this->hasMany(Kategori::class);
    }
}
