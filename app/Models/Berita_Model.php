<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita_Model extends Model
{
    use HasFactory;
    protected $table = "berita";


    protected $fillable = [
        'judul',
        'isi',
        'tgl_publikasi',
        'id_kategori',
        'id_penulis',
    ];

    public function joinKategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
