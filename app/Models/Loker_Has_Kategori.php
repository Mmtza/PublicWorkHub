<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker_Has_Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_loker',
        'id_kategori'
    ];

    protected $table = 'loker_has_kategori';

    public $timestamps = false;

    public function getLoker() {
        return $this->belongsToMany(Loker::class, 'loker_has_kategori', 'id_kategori', 'id_loker', 'id_kategori', 'id');
    }

    public function getKategori() {
        return $this->belongsToMany(Kategori::class, 'loker_has_kategori', 'id_loker', 'id_kategori', 'id_loker', 'id');
    }
}
