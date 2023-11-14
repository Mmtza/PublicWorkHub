<?php

namespace App\Models;

use App\Models\User;
use App\Models\Berita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';

    protected $fillable = [
        'isi_komentar',
        'waktu_komentar',
    ];

    public function getUser() {
        return $this->hasMany(User::class);
    }

    public function getBerita() {
        return $this->hasMany(Berita::class);
    }
}
