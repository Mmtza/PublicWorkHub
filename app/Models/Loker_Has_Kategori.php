<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker_Has_Kategori extends Model
{
    use HasFactory;

    protected $table = 'loker_has_kategori';

    public function getLoker() {
        return $this->hasMany(Loker::class);
    }

    public function getKategori() {
        return $this->hasMany(Kategori::class);
    }
}
