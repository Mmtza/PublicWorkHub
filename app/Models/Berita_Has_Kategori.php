<?php

namespace App\Models;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita_Has_Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_berita',
        'id_kategori'
    ];

    protected $table = 'berita_has_kategori';

    public $timestamps = false;

    public function getBerita() {
        return $this->belongsToMany(Berita::class, 'berita_has_kategori', 'id_kategori', 'id_berita', 'id_kategori', 'id');
    }

    public function getKategori() {
        return $this->belongsToMany(Kategori::class, 'berita_has_kategori', 'id_berita', 'id_kategori', 'id_berita', 'id');
    }
}
